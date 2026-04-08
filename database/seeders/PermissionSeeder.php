<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define all permissions with their metadata
        $permissions = [
            // User Management
            [
                'category' => 'user_management',
                'icon' => '👥',
                'permissions' => [
                    ['key' => 'users.view', 'name' => 'İstifadəçiləri görmək'],
                    ['key' => 'users.create', 'name' => 'İstifadəçi yaratmaq'],
                    ['key' => 'users.edit', 'name' => 'İstifadəçi redaktə etmək'],
                    ['key' => 'users.delete', 'name' => 'İstifadəçi silmək'],
                    ['key' => 'users.block', 'name' => 'İstifadəçi bloklamaq'],
                    ['key' => 'users.change_role', 'name' => 'Rol dəyişmək'],
                ],
            ],
            // Content Management - News
            [
                'category' => 'content_management',
                'icon' => '📰',
                'permissions' => [
                    ['key' => 'news.view', 'name' => 'Xəbərləri görmək'],
                    ['key' => 'news.create', 'name' => 'Xəbər yaratmaq'],
                    ['key' => 'news.edit', 'name' => 'Xəbər redaktə etmək'],
                    ['key' => 'news.delete', 'name' => 'Xəbər silmək'],
                ],
            ],
            // Content Management - Questions
            [
                'category' => 'content_management',
                'icon' => '📰',
                'permissions' => [
                    ['key' => 'questions.view', 'name' => 'Sualları görmək'],
                    ['key' => 'questions.create', 'name' => 'Sual yaratmaq'],
                    ['key' => 'questions.edit', 'name' => 'Sual redaktə etmək'],
                    ['key' => 'questions.delete', 'name' => 'Sual silmək'],
                ],
            ],
            // Content Management - Categories & Reels
            [
                'category' => 'content_management',
                'icon' => '📰',
                'permissions' => [
                    ['key' => 'categories.manage', 'name' => 'Kateqoriyaları idarə etmək'],
                    ['key' => 'reels.manage', 'name' => 'Instagram reels idarə etmək'],
                ],
            ],
            // System Settings
            [
                'category' => 'system_settings',
                'icon' => '⚙️',
                'permissions' => [
                    ['key' => 'settings.edit', 'name' => 'Sistem parametrlərini dəyişmək'],
                    ['key' => 'translations.manage', 'name' => 'Tərcümələri idarə etmək'],
                    ['key' => 'permissions.view', 'name' => 'İcazələri görmək'],
                    ['key' => 'permissions.edit', 'name' => 'İcazələri redaktə etmək'],
                ],
            ],
        ];

        // Define default permissions for each role
        $roleDefaults = [
            'admin' => [
                // Admin has ALL permissions
                'users.view',
                'users.create',
                'users.edit',
                'users.delete',
                'users.block',
                'users.change_role',
                'news.view',
                'news.create',
                'news.edit',
                'news.delete',
                'questions.view',
                'questions.create',
                'questions.edit',
                'questions.delete',
                'categories.manage',
                'reels.manage',
                'settings.edit',
                'translations.manage',
                'permissions.view',
                'permissions.edit',
            ],
            'moderator' => [
                // Moderator has ONLY content management
                'news.view',
                'news.create',
                'news.edit',
                'news.delete',
                'questions.view',
                'questions.create',
                'questions.edit',
                'questions.delete',
                'categories.manage',
                'reels.manage',
                'permissions.view', // Can view but not edit
            ],
            'user' => [
                // Regular user has NO admin permissions (only public access handled elsewhere)
            ],
        ];

        $roles = ['admin', 'moderator', 'user'];

        // Create permission records for each role
        foreach ($permissions as $categoryData) {
            foreach ($categoryData['permissions'] as $permissionData) {
                foreach ($roles as $role) {
                    Permission::create([
                        'role' => $role,
                        'permission_key' => $permissionData['key'],
                        'permission_name' => $permissionData['name'],
                        'category' => $categoryData['category'],
                        'icon' => $categoryData['icon'],
                        'is_granted' => in_array($permissionData['key'], $roleDefaults[$role] ?? []),
                    ]);
                }
            }
        }
    }
}
