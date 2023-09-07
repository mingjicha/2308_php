-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500001
	,19960910
	,'minji'
	,'cha'
	,'f'
	,20230907
);

SELECT * FROM employees WHERE emp_no = 500001;

-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
-- 월급
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	, 501
	, 20230907
	, 99990101
);

SELECT * FROM salaries WHERE emp_no = 500001;

-- 소속부서
INSERT INTO dept_emp (
	emp_no
	, dept_no
	, from_date
	, to_date
)
VALUES (
	500001
	, 'd001'
	, 20230907
	, 99990101
);

SELECT * FROM dept_emp WHERE emp_no = 500001;

-- 직책
INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date
)
VALUES (
	500001
	, 'Engineer'
	, 20230907
	, 99990101
);

SELECT * FROM titles WHERE emp_no = 500001;

-- 3. 짝꿍의 [1, 2]것도 넣어주세요.
-- 사원등록
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500002
	,20011206
	,'mingyeong'
	,'park'
	,'f'
	,20230907
);

SELECT * FROM employees WHERE emp_no = 500002;

-- 월급
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	, 502
	, 20230907
	, 99990101
);

SELECT * FROM salaries WHERE emp_no = 500002;

-- 소속부서
INSERT INTO dept_emp (
	emp_no
	, dept_no
	, from_date
	, to_date
)
VALUES (
	500002
	, 'd002'
	, 20230907
	, 99990101
);

SELECT * FROM dept_emp WHERE emp_no = 500002;

-- 직책
INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date
)
VALUES (
	500002
	, 'Engineer'
	, 20230907
	, 99990101
);

SELECT * FROM titles WHERE emp_no = 500002;

-- 4. 나와 짝꿍의 소속 부서를 d009로 변경해 주세요.
-- ** 기존 데이터에 덮어쓰면 전에 데이터를 확인할 수 없으니
-- 새로운 데이터를 추가해서 이전에 데이터를 확인할 수 있게 한다.
UPDATE dept_emp
SET to_date = 20230907
WHERE emp_no = 500001 AND dept_no='d001'

INSERT INTO dept_emp(
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d009'
	,20230907
	,99990101
);

SELECT * FROM dept_emp WHERE emp_no = 500001 or emp_no = 500002;

-- 5. 짝꿍의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 500002;

SELECT * FROM employees WHERE emp_no = 500001 or emp_no = 500002;

-- 6. 'd009'부서의 관리자를 나로 변경해 주세요.
-- 'd009' 관리자 오늘 끝
-- UPDATE 안에 JOIN문
UPDATE dept_manager depm
INNER JOIN employees emp 
	ON	depm.emp_no = emp.emp_no
SET depm.to_date = 20230907
WHERE emp.emp_no=111939;

-- 관리자 나로 추가
INSERT INTO dept_manager (
	dept_no
 	,emp_no
 	,from_date
 	,to_date
)
VALUES (
	'd009'
	,500001
	,20230907
	,99990101
);

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500001;

SELECT * FROM titles WHERE emp_no = 500001;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT emp.last_name 이름, emp.emp_no 사번 , sal.salary 연봉
FROM employees emp
	JOIN salaries sal 
	ON sal.emp_no = emp.emp_no
WHERE sal.salary = (SELECT MAX(sal.salary) FROM salaries sal)
	OR sal.salary = (SELECT MIN(sal.salary) FROM salaries sal);

SELECT MIN(salary), MAX(salary)
FROM salaries;

SELECT emp.last_name 이름, emp.emp_no 사번 , sal.salary 연봉
FROM employees emp
	JOIN salaries sal 
	ON sal.emp_no = emp.emp_no
WHERE 
	sal.salary = (SELECT MAX(sal.salary) FROM salaries sal)
	OR 
	sal.salary = (SELECT MIN(sal.salary) FROM salaries sal);

-- CREATE INDEX idx_test ON salaries(salary);

SELECT MIN(salary), MAX(salary) FROM salaries;

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT AVG(salary)
FROM salaries;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT emp_no, AVG(salary) sal_avg
FROM salaries
WHERE emp_no = 499975;