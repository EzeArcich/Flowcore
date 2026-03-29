<?php

return [
    'modal' => [
        'toggle' => [
            'login' => 'Log in',
            'register' => 'Create account',
        ],
        'login' => [
            'kicker' => 'Good to see you again',
            'title' => 'Sign in to keep every opportunity moving.',
            'description' => 'Pick your pipeline back up with context, pending actions and follow-ups ready to move forward.',
            'fieldsets' => [
                'credentials' => 'Credentials',
            ],
            'resume_faster' => 'Come back faster on this device.',
            'alt_action' => [
                'prompt' => 'Need an account?',
                'cta' => 'Go to sign up',
            ],
        ],
        'register' => [
            'kicker' => 'Create your space',
            'title' => 'Start managing your pipeline with structure.',
            'description' => 'Create an account to manage companies, contacts, quotes and follow-ups inside a clear workflow.',
            'fieldsets' => [
                'profile' => 'Profile',
                'security' => 'Security',
            ],
            'submit' => 'Create account',
            'alt_action' => [
                'prompt' => 'Already have an account?',
                'cta' => 'Go to login',
            ],
        ],
    ],
    'layout' => [
        'nav' => [
            'home' => 'Back to site',
        ],
        'floaters' => [
            'deal' => [
                'meta' => 'status: waiting response',
            ],
            'note' => [
                'label' => 'Note',
                'meta' => 'requested by stakeholder',
            ],
            'ambient' => [
                'orbit_studio' => [
                    'meta' => 'industry: design systems',
                ],
                'retainer' => [
                    'meta' => 'stage: sent yesterday',
                ],
                'follow_up' => [
                    'title' => 'Call due at 16:30',
                ],
                'interaction' => [
                    'meta' => 'last update: 2h ago',
                ],
            ],
        ],
        'showcase' => [
            'tagline' => 'Flowcore is where pipelines move forward',
            'login' => [
                'title' => 'Pick the thread back up and keep every opportunity moving.',
                'copy' => 'Flowcore helps you keep context visible, define the next step clearly and maintain real progress across every opportunity.',
            ],
            'register' => [
                'title' => 'Create an account and start managing follow-ups with structure.',
                'copy' => 'Flowcore keeps companies, contacts, opportunities and next steps connected so you can operate with focus and real follow-through.',
            ],
            'points' => [
                'connected' => 'Companies, contacts and conversations stay connected.',
                'due_dates' => 'Due dates turn intention into visible execution.',
                'workflow' => 'A clear workflow built for real commercial follow-through.',
            ],
        ],
        'board' => [
            'today' => 'Today',
            'follow_ups_due_now' => 'Follow-ups due now',
            'tasks' => [
                'acme_logistics' => [
                    'copy' => 'Proposal sent, reply expected this afternoon.',
                ],
                'northstar_retail' => [
                    'copy' => 'Decision maker asked for a revised quotation.',
                ],
            ],
            'pipeline_metric' => 'active opportunities',
            'execution' => 'Execution',
            'execution_metric' => 'follow-ups on time',
        ],
        'footer' => [
            'back_to_product_overview' => 'Back to site',
        ],
    ],
    'pages' => [
        'login' => [
            'header' => [
                'title' => 'Sign in to keep every opportunity moving.',
                'description' => 'Pick your pipeline back up with every next step and conversation in view.',
            ],
            'note' => [
                'label' => 'Inside Flowcore',
                'copy' => 'Today’s priorities, overdue follow-ups and pipeline context are ready the moment you sign in.',
            ],
            'facts' => [
                'daily_focus' => [
                    'label' => 'Daily focus',
                    'copy' => 'Open Flowcore and see exactly what needs attention now.',
                ],
                'context' => [
                    'label' => 'Context preserved',
                    'copy' => 'Conversations, quotes and next actions stay connected.',
                ],
            ],
        ],
        'register' => [
            'header' => [
                'title' => 'Create an account',
                'description' => 'Set up Flowcore and start managing companies, opportunities and next steps inside a clear workflow.',
            ],
            'note' => [
                'label' => 'What you get',
                'copy' => 'A commercial workspace with visible next steps, interaction history and fewer dropped opportunities.',
            ],
            'facts' => [
                'ownership' => [
                    'label' => 'Own your foundation',
                    'copy' => 'Your pipeline, your data and your operating rhythm are ready from day one.',
                ],
                'execution' => [
                    'label' => 'Built for execution',
                    'copy' => 'Designed for teams that need clarity, not CRM bureaucracy.',
                ],
            ],
        ],
    ],
];
