<?php

return [
    'list resource'    => 'List Application',
    'create resource'  => 'Create Application',
    'edit resource'    => 'Edit Application',
    'destroy resource' => 'Destroy Application',
    'title'            => [
        'application'        => 'Job Application Form',
        'applications'       => 'Applications',
        'create application' => 'Create Application',
        'edit application'   => 'Edit Application',
        'view application'   => ':id th Application'
    ],
    'button'           => [
        'create application' => 'Create Application',
    ],
    'table'            => [
    ],
    'legend'           => [
        'personal'   => 'Personal Information',
        'identity'   => 'Identity Information',
        'driver'     => 'Driver License',
        'contact'    => 'Contact Information',
        'health'     => 'Health Status',
        'criminal'   => 'Criminal Status',
        'language'   => 'Foreign Languages',
        'skills'     => 'Personal Skills',
        'education'  => 'Education Status',
        'course'     => 'Courses and Trainings',
        'experience' => 'Experiences',
        'reference'  => 'References',
        'emergency'  => 'People we can notify in case of emergency',
        'request'    => 'Application Information'
    ],
    'form'             => [
        'gender'               => 'Gender',
        'first_name'           => 'First Name',
        'last_name'            => 'Last Name',
        'language'             => 'Language',
        'nationality'          => 'Nationality',
        'marital'              => 'Marital',
        'health'               => 'Health',
        'health_desc'          => 'Did you have a serious disability or discomfort?',
        'criminal'             => 'Criminal Information',
        'criminal_desc'        => 'Do you have a criminal record?',
        'identity'             => [
            'birthdate'  => 'Birth Date',
            'birthplace' => 'Birth Place',
            'bloodgroup' => 'Blood Group',
            'no'         => 'Identity No',
            'sgk'        => 'Social Security No',
            'tax'        => 'Tax No'
        ],
        'languages'            => [
            'read'  => 'Read',
            'write' => 'Write',
            'speak' => 'Speak'
        ],
        'driver'               => [
            'type'     => 'Driver Type',
            'no'       => 'Driver No',
            'issue_at' => 'Issue Date'
        ],
        'contacts'             => [
            'address1' => 'Address',
            'address2' => 'Address',
            'county'   => 'County',
            'city'     => 'City',
            'phone'    => 'Phone',
            'gsm'      => 'Mobile',
            'postcode' => 'Postcode',
            'email'    => 'Email'
        ],
        'educate'              => [
            'start_at' => 'Start At',
            'end_at'   => 'End At',
            'name'     => 'School Name',
            'status'   => 'Degree Status',
            'branch'   => 'Branch',
            'statuses' => [
                0 => 'Select',
                1 => 'Graduated',
                2 => 'Student',
                3 => 'Abandonment'
            ]
        ],
        'courses'              => [
            'name'    => 'Course Name',
            'company' => 'Educator / Organization',
            'date'    => 'Course Date'
        ],
        'experiences'          => [
            'start_at'   => 'Start At',
            'end_at'     => 'End At',
            'company'    => 'Company',
            'department' => 'Department',
            'position'   => 'Position',
            'reason'     => 'Reason for Leaving',
            'phone'      => 'Phone',
            'full_name'  => 'Name Surname',
            'title'      => 'Title',
            'title_desc' => 'Your top management at your workplace;'
        ],
        'references'           => [
            'full_name'   => 'Name Surname',
            'work_place'  => 'Place of Work',
            'position'    => 'Position',
            'proximity'   => 'Proximity',
            'phone'       => 'Phone',
            'description' => 'I agree with the previous employers, educational institutions / institutions, public institutions and references given to confirm the information provided.'
        ],
        'emergencies'          => [
            'full_name' => 'Name Surname',
            'phone'     => 'Phone'
        ],
        'requests'             => [
            'travel'       => 'Can you go on a trip?',
            'department'   => 'Applied Position',
            'price'        => 'Requested Fee',
            'work_time'    => 'Position Type',
            'job_rotation' => 'Can you work shifts?'
        ],
        'recaptcha'            => 'Security Code',
        'attachment'           => 'Attach Document',
        'attachment delete'    => 'Delete Document',
        'attachment not found' => 'Document not found'
    ],
    'select'           => [
        'select'    => 'Select',
        'no'        => 'No',
        'yes'       => 'Yes',
        'gender'    => [
            'male'   => 'Mr.',
            'female' => 'Miss'
        ],
        'marital'   => [
            1 => 'Married',
            2 => 'Single'
        ],
        'blood'     => [
            0 => 'Select',
            1 => '0 RH+',
            2 => '0 RH-',
            3 => 'A Rh+',
            4 => 'A Rh-',
            5 => 'AB Rh+',
            6 => 'AB Rh-',
            7 => 'B Rh+',
            8 => 'B Rh-'
        ],
        'driver'    => [
            0 => 'Select',
            1 => 'B class',
            2 => 'C class',
            3 => 'D class',
            4 => 'E class',
            5 => 'F class'
        ],
        'skill'     => [
            0 => 'Select',
            1 => 'AMADEUS',
            2 => 'DCS',
            3 => 'Microsoft Office',
            4 => 'SAP',
            5 => 'SITA',
            6 => 'TROYA',
            7 => 'Other'
        ],
        'language'  => [
            'lang'  => 'Language',
            'speak' => 'Speak',
            'read'  => 'Read',
            'write' => 'Write',
            'radio' => [
                'better' => 'Good',
                'middle' => 'Middle',
                'little' => 'Little'
            ]
        ],
        'languages' => [
            'select'  => 'Select',
            'english' => 'English',
            'german'  => 'German',
            'french'  => 'French',
            'spanish' => 'Spanish',
            'russian' => 'Russian'
        ],
        'skills'    => [
            'program' => 'Program',
            'level'   => 'Level',
            'other'   => 'Other Program',
            'radio'   => [
                'better' => 'Better',
                'good'   => 'Good',
                'middle' => 'Middle',
                'little' => 'Little'
            ]
        ]
    ],
    'messages'         => [
        'notice'                => 'If the above information, address, telephone and all other explanations are correct, if not hired; I declare that I am responsible for all problems that may arise from misinformation I give; in such a case I accept all legal applications of the company in advance.',
        'success'               => 'The job application form has been successfully added. By reviewing, your party will be returned as soon as possible.',
        'update'                => 'The job application form has been successfully updated.',
        'user login required'   => 'You need to login.',
        'application not found' => 'Application not found. Please fill the form.',
        'load application'      => 'An application you\'ve done before has been loaded.'
    ],
    'validation'       => [
    ],
    'buttons'          => [
        'create' => 'Apply Now',
        'update' => 'Update'
    ]
];
