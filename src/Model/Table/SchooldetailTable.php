<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SchooldetailTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('schooldetails'); // Set the table name explicitly
    }

    public function getSessionList($ind)
    {
        $i = 0;
        $sessions = [];

        // Get the session start date from the database
        $schooldetail = $this->find()->select(['session_start_date'])->first();
        
        $year = null;

            if (!empty($schooldetail->session_start_date) && strpos($schooldetail->session_start_date, '/') !== false) {
                // Extract year from session_start_date
                $year = substr($schooldetail->session_start_date, 6, 4);
            } else {
                $year = date('Y'); // Set current year as default
            }

            $sessions = [];

            if ($year !== null) {
                if ($ind > 0) {
                    for ($i = 0; $i < $ind; $i++) {
                        $y1 = $year + 1;
                        $str = $year . '-' . substr($y1, 2, 2);
                        $year = $year + 1;
                        $sessions[$str] = $str;
                    }
                } else {
                    $ind = abs($ind);
                    $year = $year + 1;
                    for ($i = 0; $i < $ind; $i++) {
                        $y1 = $year - 1;
                        $str = $y1 . '-' . substr($year, 2, 2);
                        $year = $year + 1;
                        $sessions[$str] = $str;
                    }
                }
            }

            return $sessions;

    }
}
