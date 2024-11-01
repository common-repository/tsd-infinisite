<?

namespace TSD_Infinisite;

class Social
{

    public static function register_global_options()
    {

        $social_media_field_group = self::create_global_options();

        acf_add_local_field_group($social_media_field_group);

    }


    public static function create_global_options()
    {

        $smg_username = [
            'key' => 'field_5a29673e15429',
            'label' => 'Username',
            'name' => 'username',
            'type' => 'text'
        ];

        $smg_network = [
            'key' => 'field_5a29673e15462',
            'label' => 'Network',
            'name' => 'network',
            'type' => 'select',
            'ui' => 1,
            'choices' => [
                'facebook' => "Facebook",
                'twitter' => "Twitter",
                'instagram' => "Instagram",
                'linkedin' => "Linkedin",
                'youtube' => "Youtube",
                'pinterest' => "Pinterest",
                'email' => "Email",
                'phone' => "Phone",
            ]
        ];

        $smg_url = [
            'key' => 'field_5a29673e154d3',
            'label' => 'Url',
            'name' => 'url',
            'type' => 'url',
        ];

        $social_media_group_fields = [
            $smg_username,
            $smg_network,
            $smg_url
        ];

        $social_media_repeater = [
            'key' => 'field_5a29673e15623',
            'name' => 'social_media_accounts',
            'type' => 'repeater',
            'layout' => 'table',
            'sub_fields' => $social_media_group_fields
        ];


        $social_media_fields = [
            $social_media_repeater
        ];


        $social_media_field_group = [
            'key' => "field_5a147275e53df",
            'title' => "Social Media Accounts",
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-social-media',
                    ]
                ],
            ],
            'fields' => $social_media_fields
        ];

        return $social_media_field_group;

    }

    public static function get_global_accounts()
    {

        $networks = get_field("social_media_accounts", "options");

        return $networks;

    }


    public static function get_account_info_by_username($username = false)
    {
        if (!$username) return 'username required';

        $networks = Social::get_global_accounts();

        foreach($networks as $n)
            if($n['username'] == $username)
                return $n;

    }


}