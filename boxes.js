function Box (x, y, r, g, b, p_numBoxes, processing)
{
	this.x = x;
	this.y = y;
	this.r = r;
	this.g = g;
	this.b = b;		
	this.alpha = 255;
	this.numBoxes = p_numBoxes;

	this.update = function ()
	{
		this.alpha -= 255 / this.numBoxes;
	};
	this.draw = function ()
	{
		processing.fill (this.r, this.g, this.b, this.alpha);
		processing.rect (this.x - 20, this.y - 20, 40, 40);
	};				
};

function boxBanner ()
{

	this.boxes = new Array();
	this.numBoxes = 1;
	this.counter = 0;	
	this.mouseActive = false;
	this.lastX = 0;
	this.lastY = 0;
	this.dX = 2;
	this.dY = 1;
	
	this.clamp = function (number, min, max)
	{
		if (number > max)
		{
			number = max;
		}
		if (number < min)
		{
			number = min;
		}
		return number;
	};
	
	this.setupBoxes = function(processing, p_baseColor, p_numBoxes)
	{
		this.numBoxes = p_numBoxes;
						
		this.lastX = processing.random(processing.width);
		this.lastY = processing.random(processing.height);
	
		for (var i = 0; i < this.numBoxes; ++i)
		{
			this.boxes[i] = new Box (0, 0, p_baseColor.r, p_baseColor.g, p_baseColor.b, this.numBoxes, processing)
		}
		
		this.baseColor = p_baseColor;
	
	};	
	
	this.updateBoxes = function(processing)
	{
		var newX = processing.mouseX;
		var newY = processing.mouseY;		
		
		if (!this.mouseActive)
		{
			newX = this.lastX + this.dX + processing.random(2) - 1;
			newY = this.lastY + this.dY + processing.random(2) - 1;
		}
		else
		{
			this.dX = newX - this.lastX;
			this.dY = newY - this.lastY;
		}
		
		if (newX < 0 || newX > processing.width)
		{
			this.dX *= -1;
		}	
		
		if (newY < 0 || newY > processing.height)
		{
			this.dY *= -1;
		}
		
		this.boxes[this.counter].x = newX;
		this.boxes[this.counter].y = newY;
		var factor = 1;
		this.boxes[this.counter].r = this.baseColor.r * factor;
		this.boxes[this.counter].g = this.baseColor.g * factor;
		this.boxes[this.counter].b = this.baseColor.b * factor;
		this.boxes[this.counter].alpha = 255;
		++this.counter;
		if (this.counter >= this.numBoxes)
		{
			this.counter = 0;
		}
		for (var i = this.counter; i < this.numBoxes; ++i)
		{
			this.boxes[i].update ();
			this.boxes[i].draw ();
		}	
		for (var i = 0; i < this.counter; ++i)
		{
			this.boxes[i].update ();
			this.boxes[i].draw ();
		}
		this.lastX = newX;
		this.lastY = newY;
	};
};