<soapenv:Envelope xmlns:soapenv=http://schemas.xmlsoap.org/soap/envelope/
xmlns:mes="http://economie.fgov.be/kbopub/webservices/v1/messages"
xmlns:dat="http://economie.fgov.be/kbopub/webservices/v1/datamodel">
<soapenv:Header>
<wsse:Security>
<wsu:Timestamp>
<wsu:Created>2009-09-07T11:27:10.748Z</wsu:Created>
<wsu:Expires>2009-09-07T11:32:10.748Z</wsu:Expires>
</wsu:Timestamp>
<wsse:UsernameToken>
<wsse:Username>userid</wsse:Username>
<wsse:Password>x3+DQlYgeVm3BAkobZivkDJ13zo=</wsse:Password>
<wsse:Nonce>ENp2ha7j2Ar9cvWQeUybTQ==</wsse:Nonce>
<wsu:Created>2009-09-07T11:27:10.716Z</wsu:Created>
</wsse:UsernameToken>
</wsse:Security>
<mes:RequestContext>
<mes:Id>c1576d0a-e762-40fe-abf9-ec3f2102650b</mes:Id>
<mes:Language>nl</mes:Language>
</mes:RequestContext>
</soapenv:Header>
<soapenv:Body>
<mes:ReadEnterpriseRequest>
<dat:EnterpriseNumber>0314595348</dat:EnterpriseNumber>
</mes:ReadEnterpriseRequest>
</soapenv:Body>
</soapenv:Envelope>