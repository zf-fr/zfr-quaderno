<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

return [
    'name'        => 'Quaderno',
    'apiVersion'  => 'v1',
    'description' => 'Stripe is a payment system',
    'operations'  => [
        /**
         * --------------------------------------------------------------------------------
         * CONTACT RELATED METHODS
         *
         * DOC: https://github.com/quaderno/quaderno-api/blob/master/sections/contacts.md
         * --------------------------------------------------------------------------------
         */

        'getContacts' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/contacts.json',
            'summary'          => 'Get details about the contacts',
            'responseModel'    => 'getResponse'
        ],

        'getContact' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/contacts/{id}.json',
            'summary'          => 'Get details about a single contact',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the contact',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * INVOICE RELATED METHODS
         *
         * DOC: https://github.com/quaderno/quaderno-api/blob/master/sections/invoices.md
         * --------------------------------------------------------------------------------
         */

        'getInvoices' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/invoices.json',
            'summary'          => 'Get details about all the invoices',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'q' => [
                    'description' => 'An arbitrary string to filter the invoices',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'contact' => [
                    'description' => 'Filter by a contact ID',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],
                'state' => [
                    'description' => 'Filter by state',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
        ],

        'getInvoice' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/invoices/{id}.json',
            'summary'          => 'Get details about a single invoice',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the invoice',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'deliverInvoice' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/invoices/{id}/deliver.json',
            'summary'          => 'Deliver a single invoice to the contact email',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the invoice',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        /**
         * --------------------------------------------------------------------------------
         * WEBHOOKS RELATED METHODS
         *
         * DOC: https://github.com/quaderno/quaderno-api/blob/master/sections/webhooks.md
         * --------------------------------------------------------------------------------
         */

        'getWebhooks' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/webhooks.json',
            'summary'          => 'Get details about registered webhooks',
            'responseModel'    => 'getResponse'
        ],

        'getWebhook' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/webhooks/{id}.json',
            'summary'          => 'Get details about a single registrered webhook',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the webhook',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'createWebhook' => [
            'httpMethod'       => 'POST',
            'uri'              => '/api/v1/webhooks.json',
            'summary'          => 'Create a new webhook',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'url' => [
                    'description' => 'URL where webhooks are sent',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => true
                ],
                'event_types' => [
                    'description' => 'Event to listen to',
                    'location'    => 'query',
                    'type'        => 'array',
                    'required'    => true,
                    'items'       => [
                        'type' => 'string',
                        'enum' => [
                            'invoice.created', 'invoice.updated', 'invoice.deleted',
                            'expense.created', 'expense.updated', 'expense.deleted',
                            'estimate.created', 'estimate.updated', 'estimate.deleted'
                        ]
                    ]
                ]
            ]
        ],

        'updateWebhook' => [
            'httpMethod'       => 'PUT',
            'uri'              => '/api/v1/webhooks/{id}.json',
            'summary'          => 'Update an existing webhook',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the webhook',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],

                'event_types' => [
                    'description' => 'Event to listen to',
                    'location'    => 'query',
                    'type'        => 'array',
                    'required'    => true,
                    'items'       => [
                        'type' => 'string',
                        'enum' => [
                            'invoice.created', 'invoice.updated', 'invoice.deleted',
                            'expense.created', 'expense.updated', 'expense.deleted',
                            'estimate.created', 'estimate.updated', 'estimate.deleted'
                        ]
                    ]
                ]
            ]
        ],

        'deleteWebhook' => [
            'httpMethod'       => 'DELETE',
            'uri'              => '/api/v1/webhooks/{id}.json',
            'summary'          => 'Delete an existing webhook',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the webhook',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ]
    ],

    'models' => [
        'getResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
];
