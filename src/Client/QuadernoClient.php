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

namespace ZfrQuaderno\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

/**
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 *
 * CONTACT RELATED METHODS:
 *
 * @method array getContacts(array $args = array()) {@command Quaderno getContacts}
 * @method array getContact(array $args = array()) {@command Quaderno getContact}
 *
 * INVOICE RELATED METHODS:
 *
 * @method array getInvoices(array $args = array()) {@command Quaderno getInvoices}
 * @method array getInvoice(array $args = array()) {@command Quaderno getInvoice}
 *
 * WEBHOOKS RELATED METHODS:
 *
 * @method array getWebhooks(array $args = array()) {@command Quaderno getWebhooks}
 * @method array getWebhook(array $args = array()) {@command Quaderno getWebhook}
 * @method array createWebhook(array $args = array()) {@command Quaderno createWebhook}
 * @method array updateWebhook(array $args = array()) {@command Quaderno updateWebhook}
 * @method array deleteWebhook(array $args = array()) {@command Quaderno deleteWebhook}
 */
class QuadernoClient extends GuzzleClient
{
    /**
     * @var string
     */
    private $accountName;

    /**
     * @var string
     */
    private $token;

    /**
     * @var bool
     */
    private $sandbox;

    /**
     * Constructor
     *
     * @param string $accountName
     * @param string $token
     * @param bool   $sandbox
     */
    public function __construct($accountName, $token, $sandbox = false)
    {
        $description = new Description(include __DIR__ . '/ServiceDescription/Quaderno-v1.php');

        $this->accountName = (string) $accountName;
        $this->token       = (string) $token;
        $this->sandbox     = (bool) $sandbox;

        if ($this->sandbox) {
            $baseUrl = sprintf(
                'https://%s.sandbox-quadernoapp.com/api/v1',
                $this->accountName
            );
        } else {
            $baseUrl = sprintf(
                'https://%s.quadernoapp.com/api/v1',
                $this->accountName
            );
        }

        parent::__construct(new Client(['base_url' => $baseUrl]), $description);

        // Create a new Guzzle client and attach events
        $this->getEmitter()->on('prepared', [$this, 'authorizeRequest']);
    }

    /**
     * Get current Stripe API version
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->getDescription()->getApiVersion();
    }

    /**
     * Check if the client is currently using the sandbox mode
     *
     * @return bool
     */
    public function isSandbox()
    {
        return $this->sandbox;
    }

    /**
     * Authorize the request
     *
     * @internal
     * @param  PreparedEvent $event
     * @return void
     */
    public function authorizeRequest(PreparedEvent $event)
    {
        $event->getRequest()->setHeader('Authorization', 'Basic ' . base64_encode($this->token));
    }
}
