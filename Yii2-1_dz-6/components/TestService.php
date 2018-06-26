<?php 

namespace app\components;

use yii\base\Component;

/**
 * Test component TestService
 */
class TestService extends Component
{

	public $var = 'default_default_default';
	
	public function run()
	{
		return $this->var;
	}
}

?>