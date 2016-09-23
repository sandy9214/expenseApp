<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory {

	/**
	 * @return BudgetDAO
	 */
	public static function getBudgetDAO(){
		return new BudgetMySqlExtDAO();
	}

	/**
	 * @return ExpenseDAO
	 */
	public static function getExpenseDAO(){
		return new ExpenseMySqlExtDAO();
	}

	/**
	 * @return ExphistoryDAO
	 */
	public static function getExphistoryDAO(){
		return new ExphistoryMySqlExtDAO();
	}

	/**
	 * @return MonthDAO
	 */
	public static function getMonthDAO(){
		return new MonthMySqlExtDAO();
	}

	/**
	 * @return UsersDAO
	 */
	public static function getUsersDAO(){
		return new UsersMySqlExtDAO();
	}

	/**
	 * @return YearDAO
	 */
	public static function getYearDAO(){
		return new YearMySqlExtDAO();
	}


}
?>