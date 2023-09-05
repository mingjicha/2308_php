-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT 
	emp.emp_no
	, CONCAT(emp.first_name, ' ', emp.last_name) full_name
	, tit.title
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no;
		
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT
	emp.emp_no
	, emp.gender
	, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON	emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW();
		
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT
	CONCAT(emp.first_name, ' ', emp.last_name) full_name
	, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		WHERE (emp.emp_no = '10010');
		
-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해 주세요.
-- FROM 테이블이름X X 
-- 	JOIN 테이블이름Y y
-- 		ON x.컬럼이름M=y.컬럼이름N
-- 	JOIN 테이블이름Z z
-- 		ON y.컬럼이름O=z.컬럼이름Q;
SELECT
	dep.emp_no
	, CONCAT(emp.first_name, ' ', emp.last_name) full_name
	, deps.dept_name
FROM departments deps 
	INNER JOIN dept_emp dep
		ON deps.dept_no = dep.dept_no
	INNER JOIN employees emp
		ON dep.emp_no = emp.emp_no;


-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
SELECT emp_no
	, CONCAT(first_name, ' ', last_name) foll_name
	, salary
-- 6. 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
-- 7. 현재 직책이 "Staff"인 사원의 현재 전체 평균 월급을 출력해 주세요.
-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균 월급(정수)를 내림차순으로 출력해 주세요.
-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
-- 11. 퇴사한 여직원의 수