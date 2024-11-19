<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class AcademicsComponent extends Component
{
    public function sqCode()
    {
        $this->getController()->loadModel('Schooldetail');
        $schoolinfo = $this->getController()->Schooldetail->find()->first();
        return $schoolinfo ? $schoolinfo->sequence_code : null;
    }
}
