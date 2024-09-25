import React, { useState } from "react";
import {
    MenuFoldOutlined,
    MenuUnfoldOutlined,
    UsergroupAddOutlined,
    UserOutlined,
    ProjectOutlined,
    SettingOutlined,
    LogoutOutlined,
    DashboardOutlined,
    FileTextOutlined
} from "@ant-design/icons";
import { Layout, Menu, Button, theme, Dropdown, Avatar } from "antd";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link, usePage } from "@inertiajs/react";

const { Header, Sider, Content } = Layout;

export default function AdminLayout({ user, children }) {
    const [collapsed, setCollapsed] = useState(false);
    const {
        token: { colorBgContainer },
    } = theme.useToken();

    const { url } = usePage();

    const getSelectedKey = () => {
        if (url.startsWith(route('admin-dashboard'))) return "1";
        if (url.startsWith('/admin/contect')) return "2";
        if (url.startsWith('/admin/clients')) return "3";
        if (url.startsWith('/admin/posts')) return "4";
        return "1"; 
    };

    const items = [
        {
            key: '1',
            label: (
                <Link target="_blank" rel="noopener noreferrer" href="/admin/profile">
                    Edit  
                </Link>
            ),
            icon: <SettingOutlined />
        },
        {
            key: '2',
            label: (
                <Link href={route('logout')} method="post" as="button">
                    Logout
                </Link>
            ),
            icon: <LogoutOutlined />
        },
    ];

    return (
        
        <Layout className="h-screen">
            <Sider trigger={null} collapsible collapsed={collapsed}>
                <Link href="/">
                    <ApplicationLogo className="block w-auto fill-current text-gray-800 p-5" />
                </Link>
                <Menu
                    theme="dark"
                    mode="inline"
                    defaultSelectedKeys={[getSelectedKey()]}
                    selectedKeys={[getSelectedKey()]} 
                    items={[
                        {
                            key: "1",
                            icon: <DashboardOutlined />,
                            label: (
                                <Link href={route('admin-dashboard')}>
                                    Dashboard
                                </Link>
                            ),
                        },
                        {
                            key: "2",
                            icon: <ProjectOutlined />,
                            label: (
                                <Link href={route('admin-projects')}>
                                    Messages 
                                </Link>
                            ),
                        },
                        
                        {
                            key: "4",
                            icon: <FileTextOutlined />,
                            label: (
                                <Link href="/admin/posts">
                                    blogs
                                </Link>
                            ),
                        }
                    ]}
                />
            </Sider>
            <Layout>
                <Header
                    style={{
                        padding: 0,
                        background: colorBgContainer,
                    }}
                >
                    <div style={{ display: "flex", justifyContent: "space-between", paddingRight: "16px" }}>
                        <Button
                            type="text"
                            icon={collapsed ? <MenuUnfoldOutlined /> : <MenuFoldOutlined />}
                            onClick={() => setCollapsed(!collapsed)}
                            style={{
                                fontSize: "16px",
                                width: 64,
                                height: 64,
                            }}
                        />
                        <Dropdown menu={{ items }} trigger={["click"]} placement="bottomLeft">
                            <div onClick={(e) => e.preventDefault()} className="cursor-pointer">
                                {/* <span className="mr-2">{user.name}</span>            */}
                                <Avatar size="large" icon={<UserOutlined />} />
                            </div>
                        </Dropdown>
                    </div>
                </Header>
                <Content
                    style={{
                        margin: "24px 16px",
                        padding: 24,
                        minHeight: 280,
                        background: colorBgContainer,
                    }}
                >
                    {children}
                </Content>
            </Layout>
        </Layout>
    );
}
