<?php
class SQL
{
    protected $sql;
	protected $selectVal;
    protected $fromVal;
    protected $whereVal;
    protected $insertVal;
    protected $valuesVal;
    protected $deleteVal;
    protected $updateVal;
    protected $setVal;
	public function select(array $varWhat)
	{
		if(!empty($varWhat) && $varWhat !== "*")
		{
			$this->selectVal = "SELECT `$varWhat[0]`,`$varWhat[1]` ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function from($table)
	{
		if(!empty($table))
		{
			$this->fromVal = "FROM $table ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function where($key, $values)
	{
		if(!empty($key) && !empty($values))
		{
			
			$this->whereVal = "WHERE `$key` = '$values' ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	public function insert($varWhat)
	{
		if(!empty($varWhat))
		{
			$this->insertVal = "INSERT INTO `$varWhat` ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	public function values(array $values)
	{
		if(!empty($values))
		{
			$this->valuesVal = "VALUES ('$values[0]','$values[1]') ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function update($varWhat)
	{
		if(!empty($varWhat))
		{
			$this->updateVal = "UPDATE `$varWhat`  ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function set(array $values)
	{
		if(!empty($values))
		{
			$this->setVal = "SET `key` = '$values[0]', data = '$values[1]'  ";
			return $this;
		}
		else
		{
			return false;
		}
        return false;
	}
	
	public function delete()
	{
			$this->deleteVal = "DELETE ";
			return $this;
		
	}

    public function exec()
    {
        switch(true)
        {
            case isset($this->selectVal):
                if(!isset($this->selectVal) || empty($this->selectVal) || $this->selectVal == '*')
                {
                    return false;
                }
                $this->sql .= $this->selectVal;
                break;

            case isset($this->insertVal):
                if(!isset($this->insertVal) || empty($this->insertVal))
                {
                    return false;
                }
                $this->sql .= $this->insertVal;
                break;
            case isset($this->updateVal):
                if(!isset($this->updateVal) || empty($this->updateVal))
                {
                    return false;
                }

                $this->sql .= $this->updateVal;
                break;
            case isset($this->deleteVal):
                if(!isset($this->deleteVal) || empty($this->deleteVal))
                {
                    return false;
                }

                $this->sql .= $this->deleteVal;
                break;

        }
        if(isset($this->fromVal))
        {
            if(!isset($this->fromVal) || empty($this->fromVal))
            {
                return false;
            }

            $this->sql .= $this->fromVal;
        }
        if(isset($this->setVal))
        {
            if(!isset($this->setVal) || empty($this->setVal))
            {
                return false;
            }

            $this->sql .= $this->setVal;
        }
        if(isset($this->valuesVal))
        {
            if(!isset($this->valuesVal) || empty($this->valuesVal))
            {
                return false;
            }

            $this->sql .= $this->valuesVal;
        }
        if(isset($this->whereVal))
        {
            if(!isset($this->whereVal) || empty($this->whereVal))
            {
                return false;
            }

            $this->sql .= $this->whereVal;
        }
        return $this->sql;

    }




    }

?>
