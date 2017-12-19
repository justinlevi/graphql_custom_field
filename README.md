# graphql_custom_field


Enabling this module will allow a simple query that returns the current time - just an example for how to create a custom field plugin

QUERY 
```$xslt
query {
  currentTime
}
```


RESULT
```$xslt
{
  "data": {
    "currentTime": "2017-12-19 20:32pm"
  }
}
```