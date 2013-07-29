<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
  <html>
  <body>

<table width="100%" border="1" bgcolor="#99CCFF">
  <THEAD style="font-family:verdana; color:black; font-size:10pt; background-color: #CC99FF">
	<TR>
	   <TD width="20%"><B>Country</B></TD>
 	   <TD width="20%"><B>Capital</B></TD>
	   <TD width="20%"><B>Area</B></TD>
	   <TD width="20%"><B>Population</B></TD>
	   <TD width="20%"><B>Inflation Rate</B></TD>
	</TR>
  </THEAD> 
  <TBODY style="font-family:verdana; color:#0000CC; font-size:10pt">
	<xsl:for-each select="/cia/country">
	<TR>	
	   <TD width="20%"><xsl:value-of select="@name"/>&#160;</TD>  	
	   <TD width="20%"><xsl:value-of select="@capital"/>&#160;</TD>
	   <TD width="20%"><xsl:value-of select="@total_area"/>&#160;</TD>
	   <TD width="20%"><xsl:value-of select="@population"/>&#160;</TD>
	   <TD width="20%"><xsl:value-of select="@inflation"/>&#160;</TD>
	</TR>
	</xsl:for-each>
  </TBODY>
</table>

  
	
	</body>
    </html>
</xsl:template>
  
</xsl:stylesheet>
