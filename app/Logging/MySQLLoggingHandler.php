<?php
namespace App\Logging;
// use Illuminate\Log\Logger;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\DB;
class MySQLLoggingHandler extends AbstractProcessingHandler{
/**
 *
 * Reference:
 * https://github.com/markhilton/monolog-mysql/blob/master/src/Logger/Monolog/Handler/MysqlHandler.php
 */
    public function __construct($level = Logger::DEBUG, $bubble = true) {
        $this->table = 'logs';
        parent::__construct($level, $bubble);
    }
    protected function write(array $record):void
    {
       //dd($record);
       $user = $record['context'];
       print_r($user['user_Id']);
       $data = array(
           'user_id'       => $user['user_Id'],
           'level'         => $record['level'],
           'message'       => $record['message'],
       );
       DB::connection()->table($this->table)->insert($data);     
    }
}