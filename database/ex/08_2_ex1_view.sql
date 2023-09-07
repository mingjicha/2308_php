-- 1. VIEW란?
-- 	가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다.
-- 	여러테이블을 조인 할 시에 view를 생성하여,
-- 	복잡한 SQL을 편리하게 조회 할 수 있는 장점이 있습니다. 
-- 	** 편의성 또 현업에서는 적극적으로 사용하지 않는다. 
--       단점: INDEX(목차)를 사용할 수 없어 조회 속도가 느리다.

-- 2. VIEW 생성
-- 	CREATE [OR REPLACE] VIEW 뷰명
-- 	AS
-- 		SELECT 문
-- 	;
-- 	** [OR REPLACE] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다. **

-- 현재 재직 중인 사람들의 정보를 가져와 주세요.
CREATE VIEW view_employed_emp
AS 
	SELECT emp.*
		,tit.title
	FROM employees emp
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW()
;

SELECT * FROM VIEW_employed_emp;
-- ** 실질적인 데이터는 부모테이블에 바꾸고 VIEW에서는 바꾸지 못함.