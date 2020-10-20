<?php 

/*
<%
 Function test()
 test="TEST"
 End Function
 
 Function parse(s)
  sCommand = trim(left(s,instr(s,"(")-1))
  s=mid(s,instr(s,"(")+1)
  Select Case sCommand
    Case "WebSelectList"
    	'WriteOut_Input (left(s,instr(s,")")-1))
    
    	set rs = Server.CreateObject("ADODB.Recordset")
	rs.ActiveConnection = str_connAPB
	rs.Source = left(s,instr(s,")")-1)
	rs.CursorType = 0
	rs.CursorLocation = 2
	rs.LockType = 3
	rs.Open()
	WriteOut_WebSelectList (rs)
    	rs.Close
    Case "WebTable"
    	'WriteOut_Input (left(s,instr(s,")")-1))
    	set rs = Server.CreateObject("ADODB.Recordset")
	rs.ActiveConnection = str_connAPB
	rs.Source = left(s,instr(s,")")-1)
	rs.CursorType = 0
	rs.CursorLocation = 2
	rs.LockType = 3
	rs.Open()
	WriteOut_WebTable (rs)
	rs.Close
    Case Else
    	Response.Write ("Non Riconosciuto: " & s)
  End Select


 End Function

 Function WriteOut_WebTable(rs)
   Response.Write ("<TABLE BORDER=1 CELLPADDING=5>")
   Response.Write ("<TR>")
   for i = 0 to rs.fields.count - 1
     Response.Write ("<TH>" & rs.fields(i).name & " </TH>")
   next
   Response.Write ("</TR>")
   while not rs.eof
    Response.Write ("<TR>")
    Response.Write ("<TD> " & rs.fields(0) & " </TD>")
    Response.Write ("<TD> " & rs.fields(1) & " </TD>")
    Response.Write ("</TR>")
     rs.MoveNext
    Wend 
   Response.Write ("</TABLE>")
 End Function


 
 Function WriteOut_WebSelectList(rsoptions)
   Response.Write ("<SELECT NAME=ID SIZE=10>")
   while not rsOptions.eof
    Response.Write ("<OPTION> " & rsoptions.fields(0))
    rsOptions.MoveNext
    Wend 
   Response.Write ("</SELECT>")
 End Function
 
 Sub WriteOut_Input(value)
   Response.Write ("<INPUT TYPE=input SIZE=100 name=test value='" & value & "'>")
 End Sub
 
%>
*/

?>