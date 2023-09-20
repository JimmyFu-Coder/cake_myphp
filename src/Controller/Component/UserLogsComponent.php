<?php
declare(strict_types=1);


namespace App\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Http\ServerRequest;
/**
 * UserLogs component
 */
class UserLogsComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];
    public  function  saveIP($user_id)
    {
        $request = new ServerRequest();
        $userlogTable = TableRegistry::getTableLocator()->get('UserLogs');
        $userlog = $userlogTable->newEmptyEntity();
        $userlog->user_id = $user_id;
        $userlog->ip = $request->clientIp();
        $userlogTable->save($userlog);
    }
}
