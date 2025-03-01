/* SELECT FROM [dbo].[OIGE] a */
DECLARE @A AS DATE
DECLARE @B AS DATE
/* WHERE */
SET @A = /* a.CreateDate 'FromDate' */ '[%0]'
SET @B = /* a.CreateDate 'ToDate'  */ '[%1]'
select 
a.DocNum as 'document_number',
a.createDate as 'creation_date',
a.DocDate as 'document_date',
'' 'wo_number',
'' 'subject',
'' 'category',
b.VisOrder + 1  'line',
c.U_MIS_IssuePName 'issue_purpose',
d.U_MIS_CategoryName 'job_category',
E.U_MIS_JobDesc 'job_name',
a.U_MIS_UnitNo 'unit_number',
g.U_MIS_ModeNo 'model_number',
a.U_MIS_SerialNo 'serial_number',
a.U_MIS_HoursMeter 'hours_meter',
b.ItemCode 'item_code',
b.Dscription 'desc',
b.Quantity 'qty',
b.Stockprice 'stock_price',
b.Quantity * b.StockPrice 'total_price',
A.U_MIS_Project 'project_code',
f.WhsName 'warehouse_name',
a.U_MIS_NoBA 'no_ba_oldcore',
'' 'order_type',
CASE 
WHEN U_MIS_CancelStat='Y' THEN 'cancel'
END AS 'status_gi',
U_U_MIS_GRNo 'gr_no',
NULL 'm_ret_no',
NULL 'item_code',
NULL 'desc',
NULL 'qty',
a.Comments 'keterangan'
from OIGE a
inner join IGE1 b on a.DocEntry =  b.DocEntry
left join [@MIS_ISSUEPURPOSE] c on a.U_MIS_IssuePurpose = c.U_MIS_IssuePCode
left join [@MIS_JOBCATEGORY] d on a.U_MIS_JobCategory = d.U_MIS_CategoryCode
left join [@MIS_JOBCODE] e on a.U_MIS_JobCode = e.Code
left join OWHS f on b.WhsCode = f.WhsCode
left join OITM g on a.U_MIS_UnitNo  = g.U_MIS_UnitNo

WHERE 
a.CreateDate >= @A 
AND a.CreateDate <= @B


UNION 
select 
a.DocNum,
a.createDate,
a.DocDate,
a.U_MIS_WoNo 'wo_number',
J.Subject 'subject',
CASE J.U_Mis_JobCtg
	WHEN 'A' THEN 'Schedule'
	WHEN 'B' THEN 'Unschedule'
	WHEN 'C' THEN 'Accident'
	WHEN 'D' THEN 'Addotional Job'
	WHEN 'E' THEN 'Unit Rental'
	END As 'category',
b.VisOrder + 1  'line',
c.U_MIS_IssuePName 'issue_purpose',
d.U_MIS_CategoryName 'job_category',
E.U_MIS_JobDesc 'job_name',
a.U_MIS_UnitNo 'unit_number',
g.U_MIS_ModeNo 'model_number',
a.U_MIS_SerialNo 'serial_number',
a.U_MIS_HoursMeter 'hours_meter',
b.ItemCode 'item_code',
b.Dscription 'desc',
b.Quantity 'qty',
b.Stockprice 'stock_price',
b.Quantity * b.StockPrice 'total_price',
A.U_MIS_Project 'project_code',
f.WhsName 'warehouse_name',
a.U_MIS_NoBA 'no_ba_oldcore',
a.U_MIS_OrderType 'order_type',
'' 'status_doc',
'' 'gr_no',
h.DocNum 'm_ret_no',
i.ItemCode 'item_code',
i.Dscription 'desc',
i.Quantity 'qty',
a.Comments 'keterangan'
from ODLN a
inner join DLN1 b on a.DocEntry =  b.DocEntry
Left Join RDN1 i on B.DocEntry=i.BaseEntry AND b.ItemCode=i.ItemCode
Left Join ORDN H on h.DocEntry=i.DocEntry 
Left Join OSCL	J on a.U_MIS_WoNo=J.DocNum
left join [@MIS_ISSUEPURPOSE] c on a.U_MIS_IssuePurpose = c.U_MIS_IssuePCode
left join [@MIS_JOBCATEGORY] d on a.U_MIS_JobCategory = d.U_MIS_CategoryCode
left join [@MIS_JOBCODE] e on a.U_MIS_JobCode = e.U_MIS_JobCode
left join OWHS f on b.WhsCode = f.WhsCode
left join OITM g on a.U_MIS_UnitNo  = g.U_MIS_UnitNo

WHERE 
a.CreateDate >= @A 
AND a.CreateDate <= @B


UNION
select 
a.DocNum,
a.createDate,
a.DocDate,
d.U_MIS_WoNo 'wo_number',
e.Subject 'subject',
CASE e.U_Mis_JobCtg
	WHEN 'A' THEN 'schedule'
	WHEN 'B' THEN 'Unschedule'
	WHEN 'C' THEN 'Accident'
	WHEN 'D' THEN 'Addotional Job'
	WHEN 'E' THEN 'Unit Rental'
	END As 'Category',
b.VisOrder + 1  'line',
c.U_MIS_IssuePName 'issue_purpose',
NULL 'job_category',
NULL 'job_name',
b.U_MIS_UnitNo 'unit_number',
f.U_MIS_ModeNo 'model_number',
a.U_MIS_SerialNo 'serial_number',
a.U_MIS_HoursMeter 'hours_meter',
b.ItemCode,
b.Dscription,
b.Quantity,
b.Stockprice,
b.LineTotal 'total_price',
b.Project 'project_code',
NULL,
NULL,
a.U_MIS_OrderType,
NULL,
NULL,
NULL,
NULL,
NULL,
NULL,
a.Comments 'keterangan'
from OPCH a
inner join PCH1 b on a.DocEntry =b.DocEntry
left join ORDR d on b.U_MISMRNO =d.Docnum
left join OSCL e on d.u_mis_wono=e.docnum
left join [@MIS_ISSUEPURPOSE] c on a.U_MIS_IssuePurpose = c.U_MIS_IssuePCode
left join OITM f on b.U_MIS_UnitNo  = f.U_MIS_UnitNo
WHERE (b.ItemCode ='SV-CONSUMABLEPART' OR b.ItemCode ='SV-LABOUR' OR b.ItemCode ='SV-MILEAGE')AND
a.CreateDate >= @A AND a.CreateDate <= @B