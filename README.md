# sqlArray
PHP-function to read a SQL-table.

## Preparing
You need to do some changes in the ``$con``-variable.
``` blocks
$con = new mysqli($servername,$username,$password,$tableName);
```
Replace the variables with what they shall represent (variable names), or make variables with the same same.
> ``$servername``
> ``$username``
> ``$password``
> ``$tableName``

## Usage
``` blocks
sqlArray($sql) -> Array

```
``sqlArray($sql)`` returns an array. The ``$sql``is the query you normally use when reading from MySQL.
