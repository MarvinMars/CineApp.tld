<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'comment' => [
        'title' => 'Comments',

        'actions' => [
            'index' => 'Comments',
            'create' => 'New Comment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'content' => "Content",
            'likes' => "Likes",
            'user_id' => "User",
            'film_id' => "Film",
            'parent_id' => "Parent",
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'slug' => "Slug",
            'description' => "Description",
            
        ],
    ],

    'film' => [
        'title' => 'Films',

        'actions' => [
            'index' => 'Films',
            'create' => 'New Film',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'film_url' => "Film URL",
            'slug' => "Slug",
            'description' => "Description",
            'rating' => "Rating",
            'likes' => "Likes",
            'enabled' => "Enabled",
            'seo_keywords' => "Seo keywords",
            'seo_description' => "Seo description",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];