<?php

return [
    'list resource'    => 'List Positions',
    'create resource'  => 'Create Position',
    'edit resource'    => 'Edit Position',
    'destroy resource' => 'Destroy Position',
    'title'            => [
        'positions'            => 'Available Positions',
        'create position'      => 'Create Position',
        'edit position'        => 'Edit Position',
        'personal_criteria'    => 'Personal Criteria',
        'position_information' => 'Position Information'
    ],
    'button'           => [
        'create position' => 'Create Position',
    ],
    'table'            => [
    ],
    'form'             => [
        'name'            => 'Position',
        'slug'            => 'URL Slug',
        'reference_no'    => 'Reference No',
        'job_description' => 'Job Description',
        'qualification'   => 'Qualification',
        'personal_number' => 'Personal Number',
        'ordering'        => 'Ordering',
        'status'          => 'Status',
        'start_at'        => 'Start At',
        'end_at'          => 'End At',
        'criteria'        => [
            'experience' => 'Experience',
            'military'   => 'Military',
            'education'  => 'Education'
        ],
        'position'        => [
            'level'      => 'Position Level',
            'worktime'   => 'Working Time',
            'city'       => 'City',
            'department' => 'Department'
        ],
        'select'          => [
            'no_experience' => 'Experience or not experience',
            'experience'    => 'More than :year year experience',
            'military'      => [
                'done'      => 'Done',
                'probation' => 'Probation',
                'exempt'    => 'Exempt'
            ],
            'education'     => [
                1  => "First School (Student)",
                2  => "First School (Graduated)",
                3  => "High School (Student)",
                4  => "Lise(Graduated)",
                5  => "Associate Degree (Student)",
                6  => "Associate Degree (Graduated)",
                7  => "University (Student)",
                8  => "University (Graduated)",
                9  => "Master Degree (Student)",
                10 => "Master Degree (Graduated)",
                11 => "Doctorate (Student)",
                12 => "Doctorate (Graduated)"
            ],
            'level'         => [
                1 => 'Worker',
                2 => 'Driver',
                3 => 'Officer - Operational',
                4 => 'Officer - Support',
                5 => 'Supervisor - Operational',
                6 => 'Specialist/Supervisor - Support',
                7 => 'Manager',
                8 => 'Engineer',
                9 => 'Dispatcher'
            ],
            'time'          => [
                'select'    => 'Select',
                'part_time' => 'Part Time',
                'full_time' => 'Full Time'
            ],
            'department'    => [
                0 => 'General',
                1 => 'Administration',
                2 => 'Accounting',
                3 => 'Human Resource',
                4 => 'Production'
            ]
        ]
    ],
    'messages'         => [
    ],
    'validation'       => [
    ],
];
