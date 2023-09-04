-- DELETE의 기본구조
-- DELETE FROM 테이블명
-- WHERE 조건
-- ** 추가 : 조건을 적지않을 경우 모든 레코드가 삭제됩니다.
-- 			실수를 방지하기 위해 WHERE절을 먼저 작성하고 DELETE FROM절을 작성합니다.

-- new 부서 삭제하기
INSERT INTO departments (
	dept_no
	, dept_name
)
VALUES (
	'd010'
	, 'new'
);

SELECT * FROM departments;

COMMIT;

DELETE FROM departments
WHERE dept_no = 'd010';

SELECT * FROM departments;

COMMIT;

-- 사원정보테이블에서 사원번호가 500001이상인 사원의 데이터를 모두 삭제해 주세요.
DELETE FROM employees
WHERE emp_no >= 500001;

SELECT * FROM employees 
ORDER BY emp_no DESC;

COMMIT;