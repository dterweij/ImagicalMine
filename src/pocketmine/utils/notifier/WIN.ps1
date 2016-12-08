param(
    [String] $Title,
    [String] $text,
    [String] $iconpath
)

[Windows.UI.Notifications.ToastNotificationManager, Windows.UI.Notifications, ContentType = WindowsRuntime] | Out-Null
[Windows.UI.Notifications.ToastNotification, Windows.UI.Notifications, ContentType = WindowsRuntime] | Out-Null
[Windows.Data.Xml.Dom.XmlDocument, Windows.Data.Xml.Dom.XmlDocument, ContentType = WindowsRuntime] | Out-Null

$APP_ID = '$($Title)'

$template = @"
<toast launch="app-defined-string">
    <visual>
        <binding template="ToastText02">
            <text id="1">$($Title)</text>
            <text id="2">$($text)</text>
            <icon>$($iconpath)</icon>
        </binding>
    </visual>
</toast>
"@
$xml = New-Object Windows.Data.Xml.Dom.XmlDocument
$xml.LoadXml($template)
$toast = New-Object Windows.UI.Notifications.ToastNotification $xml
[Windows.UI.Notifications.ToastNotificationManager]::CreateToastNotifier($APP_ID).Show($toast)