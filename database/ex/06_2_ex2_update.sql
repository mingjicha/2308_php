-- UPDATE의 기본구조
-- UPDATE 테이블명
-- SET ( 컬럼1 = 값1, 컬럼2 = 값2 )
-- WHERE 조건
-- ** 추가 : 조건을 적지않을 경우 모든 레코드가 수정됩니다.
-- 			실수를 방지하기 위해 WHERE절을 먼저 작성하고 SET절을 작성합니다.
UPDATE titles
SET title = 'CEO'
WHERE emp_no = 500000;

SELECT * FROM titles WHERE emp_no = 500000;

COMMIT;


-- 500000번 사원의 직급을 'Staff', 연봉을 '25000'로 수정해 주세요.
UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

-- 영향 받은 행 : 각각 1인 것 확인하기 **1개씩 만 수정했으므로
SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;

-- COMMIT 하기 전, 잘 적용됐는지 확인하고 COMMIT
COMMIT;