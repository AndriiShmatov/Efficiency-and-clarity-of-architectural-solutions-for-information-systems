<?php

interface Visitor
{
    public function visitCompany(Company $company): void;
    public function visitDepartment(Department $department): void;
    public function visitEmployee(Employee $employee): void;
}

interface Element
{
    public function accept(Visitor $visitor): void;
}

class Company implements Element
{
    private $departments;

    public function __construct(array $departments) {}

    public function getDepartments(): array {}
    public function accept(Visitor $visitor): void {}
}

class Department implements Element
{
    private $employees;

    public function __construct(array $employees) {}

    public function getEmployees(): array {}
    public function accept(Visitor $visitor): void {}
}

class Employee implements Element
{
    private $position;

    private $salary;

    public function __construct(string $position, float $salary) {}

    public function getPosition(): string {}
    public function getSalary(): float {}
    public function accept(Visitor $visitor): void {}
}

class SalaryReportVisitor implements Visitor
{
    private $report;

    public function visitCompany(Company $company): void {}
    public function visitDepartment(Department $department): void {}
    public function visitEmployee(Employee $employee): void {}

    public function getReport(): string {}
}

$developer = new Employee('Розробник', 50000);
$tester = new Employee('Тестувальник', 35000);
$accountant = new Employee('Бухгалтер', 30000);

$itDepartment = new Department(array($developer, $tester));
$financeDepartment = new Department(array($accountant));

$company = new Company(array($itDepartment, $financeDepartment));

$companyReport = new SalaryReportVisitor();
$company->accept($companyReport);
echo $companyReport->getReport();

$departmentReport = new SalaryReportVisitor();
$itDepartment->accept($departmentReport);
echo $departmentReport->getReport();
