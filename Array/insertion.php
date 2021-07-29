<?php

class ArrayInsertion
{
	private $array = [];
	private $size;
	private $top = -1; // means array is empty.

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function insert($item)
	{
		if ($this->top < $this->size - 1) {  // $this->size - 1 = 5-1 = 4
			$this->top = $this->top + 1;
			$this->array[$this->top] = $item;

			return $this->top .' => ' . $item;
		} else {
			echo 'Oops, array size is over.';
			die();
		}
	}

	public function display()
	{
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} else {
			return $this->array;
		}
	}
}

$array = new ArrayInsertion(5);
$array->insert(10);
$array->insert(20);
$array->insert(30);
$array->insert(40);
$array->insert(50);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());