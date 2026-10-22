<?php

namespace App\Http\Controllers;

use App\Mcp\ContentTools;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Throwable;

/**
 * Minimal MCP (Model Context Protocol) server over streamable HTTP, JSON responses only.
 * Lets Claude manage website content (see App\Mcp\ContentTools).
 * Auth: secret token in the URL (/mcp/{token}) or as "Authorization: Bearer {token}".
 */
class McpController extends Controller
{
    private const PROTOCOL = '2025-03-26';

    public function __invoke(Request $request, ?string $token = null)
    {
        $secret = (string) config('services.mcp.token');
        $given = $token ?? $request->bearerToken();

        // Disabled unless a strong token is configured. 404 so the endpoint isn't advertised.
        if ($secret === '' || strlen($secret) < 32 || ! is_string($given) || ! hash_equals($secret, $given)) {
            abort(404);
        }

        if (! $request->isMethod('post')) {
            return response('', 405, ['Allow' => 'POST']);
        }

        $msg = $request->json()->all();
        if (! isset($msg['jsonrpc'], $msg['method'])) {
            return $this->error(null, -32600, 'Invalid request');
        }

        // Notifications have no id and get no JSON-RPC response.
        if (! array_key_exists('id', $msg)) {
            return response('', 202);
        }

        $id = $msg['id'];

        return match ($msg['method']) {
            'initialize' => $this->result($id, [
                'protocolVersion' => self::PROTOCOL,
                'capabilities' => ['tools' => (object) []],
                'serverInfo' => ['name' => 'execudea-cms', 'version' => '1.0.0'],
                'instructions' => 'Manage website content for Execudea: blog posts, service pages, courses, FAQs and text site settings. '
                    .'New posts are drafts and new services/FAQs are inactive; an admin publishes them. '
                    .'Edits to live content go live immediately, so read the current version first and confirm larger changes with the user. '
                    .'Start with audit_seo or list_posts.',
            ]),
            'ping' => $this->result($id, (object) []),
            'tools/list' => $this->result($id, ['tools' => ContentTools::definitions()]),
            'tools/call' => $this->callTool($id, $msg['params'] ?? []),
            default => $this->error($id, -32601, 'Method not found'),
        };
    }

    private function callTool($id, array $params): JsonResponse
    {
        $name = (string) ($params['name'] ?? '');

        try {
            $out = ContentTools::call($name, (array) ($params['arguments'] ?? []));
            Log::info('MCP tool call', ['tool' => $name]);

            return $this->result($id, [
                'content' => [['type' => 'text', 'text' => json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)]],
            ]);
        } catch (Throwable $e) {
            $message = match (true) {
                $e instanceof ModelNotFoundException => 'Record not found.',
                $e instanceof InvalidArgumentException => $e->getMessage(),
                default => 'Tool failed.',
            };
            if ($message === 'Tool failed.') {
                Log::error('MCP tool failed', ['tool' => $name, 'exception' => $e]);
            }

            return $this->result($id, ['isError' => true, 'content' => [['type' => 'text', 'text' => $message]]]);
        }
    }

    private function result($id, $result): JsonResponse
    {
        return response()->json(['jsonrpc' => '2.0', 'id' => $id, 'result' => $result]);
    }

    private function error($id, int $code, string $message): JsonResponse
    {
        return response()->json(['jsonrpc' => '2.0', 'id' => $id, 'error' => ['code' => $code, 'message' => $message]]);
    }
}
