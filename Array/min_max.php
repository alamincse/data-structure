<?php

class ArrayMinMax
{
	private $array = [];
	private $size;
	private $front = 0; // means, has an element in the array.
	private $top = -1; // means array is empty.
	private $max;
	private $min;

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

	public function getMinMax()
	{
		// when array is empty
		if ($this->top == -1) {
			return 'Oops, array is empty!';
		} elseif ($this->top == 0) { // when array has only one element.
			$this->max = $this->array[$this->front];
			$this->min = $this->array[$this->front];
		} elseif ($this->top == 1) { // when array has more than one elements.
			if ($this->array[$this->top - 1] > $this->array[$this->top]) {
				$this->max = $this->array[$this->top - 1];
				$this->min = $this->array[$this->top];
			} else {
				$this->max = $this->array[$this->top];
				$this->min = $this->array[$this->top - 1];
			}
		} elseif ($this->top > 1) {
			$this->max = $this->array[$this->front];
			$this->min = $this->array[$this->front];
			
			for ($this->front + 1; $this->front <= $this->top; $this->front++) {
				if ($this->max < $this->array[$this->front]) {
			      	$this->max = $this->array[$this->front];
				} elseif ($this->min > $this->array[$this->front]) {
			      	$this->min = $this->array[$this->front];
				}
			}
		}

		return 'Maximun value is '. $this->max .'<br/>' . 'Minimum value is '. $this->min;
	}
}

$array = new ArrayMinMax(5);
$array->insert(20);
$array->insert(30);
$array->insert(150);
$array->insert(90);
$array->insert(10);

// Array is overflow! Because array index is over more than array size.
// $array->insert(60);

echo '<pre>';
print_r($array->display());

echo $array->getMinMax();