<?php
/**
* 
*/
class CreditCard
{
	private $cardNumber;
	private $cardNumberLength = 16;
	public $outputMessage;
	/**
	* Validate the input parameter
	*
	* @param string $input
	* @return boolean
	*/
	public function validateInput($input)
	{
		if(!is_numeric($input))
		{
			$this->outputMessage = "Please enter only digits as Credit Card Number";
			return false;
		}
		else if(strlen($input) != $this->cardNumberLength)
		{
			$this->outputMessage = "Please enter 16 digit Credit Card Number";
			return false;
		}
		else
		{
			$this->cardNumber = $input;
			$this->validateCard();
		}
	}
	/**
	* Validate the Credit Card number using Validation Algorithm
	*
	* @return boolean
	*/
	private function validateCard()
	{
		$sum = 0;
		for ($i=$this->cardNumberLength-1; $i >= 0; $i--) 
		{ 

			if($i%2 != 0)
			{
				$sum += $this->cardNumber[$i];
			}
			else
			{
				if($this->cardNumber[$i]<5)
				{
					$sum += 2*$this->cardNumber[$i];
				}
				else
				{
					$doubledValue = (string)(2*$this->cardNumber[$i]);
					$sum += ($doubledValue[0]+$doubledValue[1]);
				}
			}
		}
		if($sum%10)
		{
			$this->outputMessage = "Credit Card ".$this->cardNumber." is not valid.";
			return false;
		}
		else
		{
			$this->outputMessage = "Credit Card ".$this->cardNumber." is valid.";
			return true;
		}
	}
}
?>