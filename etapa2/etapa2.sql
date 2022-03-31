select d.dept_name,
		concat(e.first_name,' ',e.last_name) as name,
        TIMESTAMPDIFF(DAY,de.from_date,de.to_date) AS total_dias
from 	employees e
		inner join dept_emp de on e.emp_no = de.emp_no
        inner join departments d on d.dept_no = de.dept_no
        

order by total_dias desc
LIMIT 10;