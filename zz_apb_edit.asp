<!--#include file="conn.inc"-->

<%
pageid=Request.QueryString("pageid")

if pageid="" then
  Response.Write ("PAGINA NON SPECIFICATA")
  Response.Redirect "pgexp.asp?pageid=apb"
end if
%>

<%
set rsPage = Server.CreateObject("ADODB.Recordset")
rsPage.ActiveConnection = str_connAPB
rsPage.Source = "SELECT pagedescription,pagebody FROM apb_pages WHERE pageid ='" & pageid & "'"
rsPage.CursorType = 0
rsPage.CursorLocation = 2
rsPage.LockType = 3
rsPage.Open()
%>


<H2 ALIGN=CENTER>Edit the page " <% Response.Write (pageid) %> </EM>" in the "<EM>apb_pages</EM>" table</H2>
<HR>
<FORM METHOD=POST ACTION="apb_edit?action=update">
<INPUT type=hidden name=MIval value=apb_update>
<INPUT type=hidden name=ID value=pageid>
<INPUT type=hidden name=TABLE value=TABLE>
<STRONG>Page Name: </STRONG><% Response.Write (pageid) %>
<P>

<STRONG>Page Description: </STRONG><INPUT TYPE=input NAME=descr size=50 value=' <%Response.Write (rsPage.Fields("pagedescription"))%> '>
<P>
<STRONG>Page Contents:</STRONG><BR>
<TEXTAREA NAME=page ROWS=20 COLS=80 > <%Response.Write (rsPage.Fields("pagebody"))%> </TEXTAREA>
<P>
<INPUT TYPE=submit VALUE="Update Page">
</FORM>
</BODY>
</HTML>
