-- 0. JOIN이란?
-- 	두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것입니다. 

-- 1. INNER JOIN의 구조 A ∩ B
-- 	SELECT 컬럼1, 컬럼2
-- 	FROM 테이블1 INNER JOIN 테이블2
-- 		ON 조인 조건 	** 조인에 조건을 두려면 AND나 OR 사용
-- 	[WHERE 검색조건] 	** 전체 쿼리문에 조건이 붙음

--  현재 소속된 부서를 찾아주세요.
SELECT 
	emp.emp_no
	, emp.first_name
	, emp.last_name
	, dp.dept_no
FROM employees emp
	INNER JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();

-- 2. OUTER JOIN  	** A에서 교집합은 값이 나오고 나머지 A부분은 NULL
-- 		: 기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- SELECT 컬럼1, 컬럼2 ...
-- FROM 테이블1
-- 	[ LEFT | RIGHT ] OUTER JOIN 테이블2 	** LEFT - A, RIGHT - B 
-- 		ON 조인 조건
-- WHERE 검색조건;

-- 각 부서의 현재 매니저를 찾아주세요.
SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
-- WHERE dept_no IS NOT NULL;
WHERE emp.emp_no >= 110000;