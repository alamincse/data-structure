<?php 

class Stack
{
	/** Store stack element */
	private $stack = [];

	/** Size of stack */
	private $size; 

	/** -1 means stack is empty */
	private $top = -1;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function push($item)
	{	
		/** check stack size is over or not! */
		if ($this->top == $this->size - 1) {
			return 'Oops, stack is overflow!';
		} else {
			$this->top = $this->top + 1;
			$this->stack[$this->top] = $item;

			return $this->stack;
		}
	}

	public function display()
	{
		if ($this->top == -1) {
			return 'Stack is empty!';
		} elseif ($this->top >= 0) {
			return $this->stack;
		}
	}

	public function pop()
	{
		/** Check stack empty or not! */
		if ($this->top == - 1) {
			return 'Stack is empty!';
		} elseif ($this->top >= 0) { // 0 means, stack has value. like array index start with 0.
			$pop = $this->stack[$this->top];
			$this->stack[$this->top] = -1; // -1 means value is empty.
			$this->top = $this->top - 1;
			return $pop;
		}
	}

	public function peek()
	{
		/** Check stack empty or not! */
		if ($this->top == - 1) {
			return 'Stack is empty!';
		} elseif ($this->top >= 0) { // 0 means, stack has value. like array index start with 0.
			return $this->stack[$this->top];
		}
	}
}

$stack = new Stack(5);
// print_r($stack->peek());
$stack->push(10);
$stack->push(20);
$stack->push(30);
$stack->push(40);
$stack->push(50);

// Stack is overflow! Because size is over more than stack size.
// print_r($stack->push(60));

echo '<pre>';
print_r($stack->display());

echo 'Stack peek ' . $stack->peek() .'<br/>';


echo 'Stack pop ' . $stack->pop() .'<br/>';
echo 'After pop: <pre>';
print_r($stack->display());

$stack->push(60);
echo 'After push 60: <pre>';
print_r($stack->display());