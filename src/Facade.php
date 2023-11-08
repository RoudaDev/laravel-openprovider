<?php

namespace rouda\OpenProvider;

/**
 * @method static \rouda\OpenProvider\Api\Customers customers()
 * @method static \rouda\OpenProvider\Api\Domains domains()
 * @method static \rouda\OpenProvider\Api\Emails emails()
 * @method static \rouda\OpenProvider\Api\EmailsTemplates emailstemplates()
 * @method static \rouda\OpenProvider\Api\Extensons extensions()
 * @method static \rouda\OpenProvider\Api\Financials financials()
 * @method static \rouda\OpenProvider\Api\Licenses licenses()
 * @method static \rouda\OpenProvider\Api\NameServers nameservers()
 * @method static \rouda\OpenProvider\Api\NameServersGroups nameserversgroups()
 * @method static \rouda\OpenProvider\Api\Resellers resellers()
 * @method static \rouda\OpenProvider\Api\SpamExperts spamexperts()
 * @method static \rouda\OpenProvider\Api\Ssl ssl()
 * @method static \rouda\OpenProvider\Api\Tags tags()
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'OpenProvider';
    }
}
