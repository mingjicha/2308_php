-- SELECT [DISTINCT] [컬럼명]
-- FROM [테이블명]
-- 	JOIN [테이블명] ON [조인조건]
-- WHERE [쿼리 조건]
-- GROUP BY [컬럼명] HAVING [집계함수 조건]
-- ORDER BY [컬럼명 ASC || 컬럼명 DESC]
-- LIMIT 출력수 [OFFSET 시작번호]
-- ;

-- 1. 직책 테이블의 모든 정보를 조회해 주세요.
SELECT *
FROM title;

-- 2. 급여가 60,000 이하인 사원의 사번을 조회해 주세요.
SELECT emp_no, salary
FROM salaries
WHERE salary <= 60000;

-- 3. 급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요.
SELECT emp_no, salary
FROM salaries
WHERE salary >= 60000
	AND salary <= 70000;

-- 4. 사원번호가 10001, 10005인 사원의 모든 정보를 조회해 주세요.
SELECT *
FROM employees
WHERE emp_no = 10001
	OR emp_no = 10005;
	
-- 5. 직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요.
SELECT emp_no, title
FROM titles
WHERE title LIKE '%Engineer%';

-- 6. 사원 이름을 오름차순으로 정렬해서 조회해 주세요.
SELECT emp_no, CONCAT(last_name, ' ' ,first_name) 
FROM employees
ORDER BY last_name ASC;

-- 7. 사원별 급여의 평균을 조회해 주세요.
SELECT AVG(salary)
FROM salaries;

-- 8. 사원별 급여의 평균이 30,000 ~ 50,000인, 사원번호와 평균 급여를 조회해 주세요.
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no 
	HAVING AVG(salary) >= 30000 
		AND AVG(salary) <= 50000;

-- 9. 사원별 급여 평균이 70,000이상인 사원의 사번, 이름, 성, 성별을 조회해 주세요.
SELECT emp.emp_no, CONCAT(emp.last_name, ' ' ,emp.first_name), emp.gender
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
GROUP BY emp.emp_no
	HAVING AVG(sal.salary) >= 70000;

-- 10. 현재 직책이 "Senior Engineer"인 사원의 사원번호와 성을 조회해 주세요.
SELECT emp.emp_no, emp.last_name, tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
GROUP BY emp.emp_no
	HAVING tit.title = 'Senior Engineer';