<?php
class replace_object
{
	private $output,$expl,$i,$ii,$expll,$outputt;
	function __construct($value_to_replace,$replacer_values,$source,$delimiter)
	{
			$this->expl=explode($delimiter,$value_to_replace);
			$this->output=$source;
		
			for($this->i=0; $this->i<count($this->expl); $this->i++)
			{
			$this->output=str_replace($this->expl[$this->i],$this->get_replacer($this->i,$replacer_values,$delimiter),$this->output);
				
			}
			return $this->output;
	}
	function get_output()
	{
		return $this->output;
	}
	
	private function get_replacer($array_id,$replacer_values,$delimiter)
	{
		$this->outputt='';
	$this->expll=explode($delimiter,$replacer_values);
		for($this->ii=0; $this->ii<count($this->expll); $this->ii++)
		{
		 if($this->ii==$array_id)
		 {
		$this->outputt=$this->expll[$this->ii];
		 }
		
		}
		return $this->outputt;
	}
}
?>