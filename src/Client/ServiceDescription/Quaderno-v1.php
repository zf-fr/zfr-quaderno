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
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'page' => [
                    'description' => 'Page number',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
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

        'getStripeContact' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/stripe/customers/{id}.json',
            'summary'          => 'Get details about a single contact from its Stripe ID',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Stripe customer ID',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ]
            ]
        ],

        'updateContact' => [
            'httpMethod'       => 'PUT',
            'uri'              => '/api/v1/contacts/{id}.json',
            'summary'          => 'Update details of an existing contact',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'id' => [
                    'description' => 'Unique identifier of the contact',
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true
                ],
                'first_name' => [
                    'description' => 'First name of the contact (not if company)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'last_name' => [
                    'description' => 'Last name of the contact (not if company)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'contact_name' => [
                    'description' => 'Contact name (full name)',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'street_line_1' => [
                    'description' => 'Street line 1',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'street_line_2' => [
                    'description' => 'Street line 2',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'city' => [
                    'description' => 'City of the contact',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'postal_code' => [
                    'description' => 'Postal code of the contact',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'region' => [
                    'description' => 'Region of the contact',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'country' => [
                    'description' => 'Country code of the country',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'tax_id' => [
                    'description' => 'Tax ID',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'vat_number' => [
                    'description' => 'VAT number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone_1' => [
                    'description' => 'First phone number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'phone_2' => [
                    'description' => 'Second phone number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'fax' => [
                    'description' => 'Fax number',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'email' => [
                    'description' => 'Email address of the contact',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
                ],
                'language' => [
                    'description' => 'Language of the user',
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => false
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
                ],
                'page' => [
                    'description' => 'Page number',
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
            'summary'          => 'Deliver an invoice',
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
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'page' => [
                    'description' => 'Page number',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ]
            ]
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
                    'location'    => 'json',
                    'type'        => 'string',
                    'required'    => true
                ],
                'events_types' => [
                    'description' => 'Events to listen to',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'items'       => [
                        'type' => 'string',
                        'enum' => [
                            'invoice.created', 'invoice.updated', 'invoice.deleted',
                            'expense.created', 'expense.updated', 'expense.deleted',
                            'estimate.created', 'estimate.updated', 'estimate.deleted',
                            'payment.created'
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

                'events_types' => [
                    'description' => 'Event to listen to',
                    'location'    => 'json',
                    'type'        => 'array',
                    'required'    => true,
                    'items'       => [
                        'type' => 'string',
                        'enum' => [
                            'invoice.created', 'invoice.updated', 'invoice.deleted',
                            'expense.created', 'expense.updated', 'expense.deleted',
                            'estimate.created', 'estimate.updated', 'estimate.deleted',
                            'payment.created'
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
        ],

        /**
         * --------------------------------------------------------------------------------
         * TAXES RELATED METHODS
         *
         * DOC: https://github.com/quaderno/quaderno-api/blob/master/sections/taxes.md
         * --------------------------------------------------------------------------------
         */

        'calculateTaxes' => [
            'httpMethod'       => 'GET',
            'uri'              => '/api/v1/taxes/calculate.json',
            'summary'          => 'Calculate taxes for a given customer data',
            'responseModel'    => 'getResponse',
            'parameters'       => [
                'country' => [
                    'description' => 'The customer\'s two-letters country code',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],

                'postal_code' => [
                    'description' => 'The customer\'s postal code',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
                ],

                'vat_number' => [
                    'description' => 'The customer\'s VAT number',
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false
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
