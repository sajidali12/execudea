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
import { Layout, Menu, Button, theme, Dropdown, Avatar, Flex } from "antd";
import ApplicationLogo from "@/Components/ApplicationLogo";
import { Link } from "@inertiajs/react";
const { Header, Sider, Content } = Layout;

export default function AdminLayout({ user, children }) {
    const [collapsed, setCollapsed] = useState(false);
    const {
        token: { colorBgContainer },
    } = theme.useToken();
    const items = [
        {
          key: '1',
          label: (
            <a target="_blank" rel="noopener noreferrer" href="https://www.antgroup.com">
              Settings
            </a>
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
                    defaultSelectedKeys={["1"]}
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
                                  Projects
                                </Link>
                              ),

                        },
                        {
                            key: "3",
                            icon: <UsergroupAddOutlined />,
                            label: "Clients",
                        },
                        {
                            key: "4",
                            icon: <FileTextOutlined />,
                            label: (
                                <Link href="/admin/posts">
                                  Posts
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
                    <Flex justify="space-between" className="pr-4">
                    <Button
                        type="text"
                        icon={
                            collapsed ? (
                                <MenuUnfoldOutlined />
                            ) : (
                                <MenuFoldOutlined />
                            )
                        }
                        onClick={() => setCollapsed(!collapsed)}
                        style={{
                            fontSize: "16px",
                            width: 64,
                            height: 64,
                        }}
                    />
                    <Dropdown
                        menu={{ items }}
                        trigger={["click"]}
                        placement="bottomLeft"
                    >
                        <div onClick={(e) => e.preventDefault()} className="cursor-pointer">
                        <span className="mr-2">{user.name}</span>
                            <Avatar size="large" icon={<UserOutlined />} />
                        </div>
                    </Dropdown>
                    </Flex>
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
