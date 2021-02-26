# Hideword

typecho插件 你知道的太多了~
把Markdown的~~删除线~~转化为黑幕,只有选中才可以看到,并提示`你知道的太多了`

## 使用方法 

解压
上传至usr/plugins目录
重命名文件夹为`Hideword`
启用即可

## 实现原理

很简单，就只是引用了jQuery和两个文件`hideword.js`和`hideword.css`
做成插件只是为了开关方便（~~绝对不是为了鸽~~

css
```
del{
    text-decoration:none;
    background-color: #252525;
    color: #252525;
    text-shadow: none;
}
del:hover {
    color:#fff;
}
```

js
```
$("del").attr("title","你知道的太多了");
```
```
