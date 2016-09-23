<?php
/**
 * Object represents table 'budget'
 *
 * @author: http://phpdao.com
 * @date: 2016-09-04 12:47
 */
class Budget {
	private $budgetId;
	private $budgetdate;
	private $estimatedBudget;
	private $realExpense;

	public function getBudgetId() {
		return $this->budgetId;
	}

	public function setBudgetId($budgetId) {
		$this->budgetId = $budgetId;
	}

	public function getBudgetdate() {
		return $this->budgetdate;
	}

	public function setBudgetdate($budgetdate) {
		$this->budgetdate = $budgetdate;
	}

	public function getEstimatedBudget() {
		return $this->estimatedBudget;
	}

	public function setEstimatedBudget($estimatedBudget) {
		$this->estimatedBudget = $estimatedBudget;
	}

	public function getRealExpense() {
		return $this->realExpense;
	}

	public function setRealExpense($realExpense) {
		$this->realExpense = $realExpense;
	}


}
?>