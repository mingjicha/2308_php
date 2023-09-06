-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT 
	emp.emp_no
	,CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no;
		
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT
	emp.emp_no
	,emp.gender
	,sal.salary
FROM employees emp
	JOIN salaries sal
		ON	emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW();
		
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT
	emp.emp_no
	,CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = '10010';
		
-- 4. 현재 사원의 사원번호, 풀네임, 소속부서명을 출력해 주세요.
-- INNER JOIN 복수 사용
-- FROM 테이블이름X X 
-- 	JOIN 테이블이름Y y
-- 		ON x.컬럼이름M=y.컬럼이름N
-- 	JOIN 테이블이름Z z
-- 		ON y.컬럼이름O=z.컬럼이름Q;
SELECT
	dep.emp_no
	,CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,deps.dept_name
FROM departments deps 
	JOIN dept_emp dep
		ON deps.dept_no = dep.dept_no
	JOIN employees emp
		ON dep.emp_no = emp.emp_no
WHERE dep.to_date >= NOW();


-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
-- LIMIT 사용하는 방법
SELECT emp.emp_no
	,CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW()
ORDER BY salary DESC
LIMIT 10;

-- RANK 사용하는 방법
-- SELECT RNK.*
-- FROM(
-- 		SELECT 
-- 			emp.emp_no
-- 			,concat(emp.first_name, ' ', emp.last_name) fullname
-- 			,sal.salary
-- 			,RANK() over(order by sal.salary DESC) rn  
-- 		FROM employees emp
-- 			INNER JOIN salaries sal
-- 			ON emp.emp_no = sal.emp_no
-- 		WHERE sal.to_date >= NOW()
-- 		) RNK
-- WHERE RNK.rn <= 10;

-- 6. 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
SELECT deps.dept_name
	,CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,emp.hire_date
FROM employees emp
	JOIN dept_manager depm
		ON emp.emp_no = depm.emp_no
		AND depm.to_date >= NOW()
	JOIN departments deps
		ON depm.dept_no = deps.dept_no;
		
-- 7. 현재 직책이 "Staff"인 사원의 전체 평균 월급을 출력해 주세요.
SELECT tit.title, AVG(sal.salary) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
WHERE tit.to_date >= NOW()
  AND sal.to_date >= NOW()
  AND tit.title = 'staff'
GROUP BY tit.title;
		
-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT CONCAT(emp.first_name, ' ', emp.last_name) full_name
	,emp.hire_date
	,emp.emp_no
	,depm.dept_no
FROM employees emp
	JOIN dept_manager depm
		ON emp.emp_no = depm.emp_no;
	
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균 월급(정수)를 내림차순으로 출력해 주세요.
-- INNER JOIN 안에 GROUP BY
SELECT tit.title
	,FLOOR(AVG(sal.salary)) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
WHERE sal.to_date >= NOW()
  AND tit.to_date >= NOW()
GROUP BY tit.title HAVING avg_sal >= 60000
ORDER BY avg_sal DESC;


-- 10. 현재 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT tit.title, COUNT(*)
FROM employees emp
	JOIN  titles tit
		ON emp.emp_no = tit.emp_no
WHERE emp.gender = 'F'
  AND tit.to_date >= NOW()
GROUP BY tit.title;
		
-- 11. 퇴사한 여직원의 수
SELECT emp.gender, COUNT(*)
FROM employees emp
	INNER JOIN (
		SELECT emp_no
		FROM titles tit
		GROUP BY tit.emp_no HAVING MAX(tit.to_date) != 99990101 ) tit
		ON emp.emp_no = tit.emp_no
	GROUP BY emp.gender;
-- ** GROUP BY 복수의 emp_no를 하나로 묶고 그 중에서 가장 큰 수를 가져온다
-- ** != "같지 않다" 라는 뜻
-- ** INNER JOIN (퇴사자의 수)
		
		

