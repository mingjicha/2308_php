-- 1. 짝꿍의 인적사항을 사원테이블에 삽입해 주세요.
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	600000
	,19960106
	,'myungho'
	,'jung'
	,'F'
	,20230927
);
 
SELECT * FROM employees WHERE emp_no = 600000;

-- 2. 1번에서 삽입한 짝꿍의 월급을 삽입해 주세요.
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	600000
	, 28
	, 20230927
	, 99990101
);

SELECT * FROM salaries WHERE emp_no = 600000;

-- 3. 이름이 'Sachin'인 사람의 성별을 'F', 생일을 1970-01-01로 변경해 주세요.
UPDATE employees
SET gender = 'F'
	, birth_date = 19700101
WHERE first_name = 'sachin';

SELECT * FROM employees WHERE first_name = 'sachin';

-- 4. 짝꿍의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 600000;

DELETE FROM salaries
WHERE emp_no = 600000;

SELECT * FROM employees WHERE emp_no = 600000;
SELECT * FROM salaries WHERE emp_no = 600000;
