# ![ImagicalMine](https://snag.gy/DOEdaX.jpg) <br>
 Full size img: http://i.imgur.com/emmkLHg.jpg
 
## ImagicalMine is a spoon of [PocketMine-MP](https://github.com/pmmp/PocketMine-MP).<br>The 0.16.0 protocol changes were also forked from PocketMine.
## Thanks to PocketMine due to the most of the original code is written by them.

[![Travis Build](https://travis-ci.org/Inactive-to-Reactive/ImagicalMine.svg)](https://travis-ci.org/Inactive-to-Reactive/ImagicalMine) <br>
IN DEV: [![Build status](https://ci.appveyor.com/api/projects/status/vyarr1tt50639w0f/branch/master?svg=true)](https://ci.appveyor.com/project/remotevase/imagicalmine/branch/master) <br>
 __[Working **temporary** jenkins server!](http://jenkins.terweij.nl/job/ImagicalMine/)__ <br>
Another download link is on our [wiki download server.](https://github.com/Inactive-to-Reactive/ImagicalMine/wiki/ImagicalMine-0.15-Phar-Files!)
<br>


## Quick Links (Instead of scrolling, click these!)

__[Demo Server](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#demo-server)__ <br>
__[Installation](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#installation)__ <br>
__[Resources](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#resources)__ <br>
__[Windows Powershell Scripts](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#windows-powershell-scripts)__ <br>
__[Acknowledgements](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#acknowledgements)__ <br>


<br>

## Demo Server

Below is the ImagicalMine demo server details, you can see what features ImagicalMine has before downloading it.<br>
**TO BE CHOSEN SOON** <br>
__[Back to QuickLinks](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#quick-links-instead-of-scrolling-click-these)__
<br>

## Installation

**Self-installation:**<br>
Supported platforms: Linux, Windows, OS X, Raspberry Pi, and ODROID <br>
[Installing Introductions](https://github.com/Inactive-to-Reactive/ImagicalMine/wiki/Installation)<br>
__[Back to QuickLinks](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#quick-links-instead-of-scrolling-click-these)__
<br>

## Resources

**Guides**
* __[Contributing Guidelines](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master//.github/CONTRIBUTING.md)__
**External Links**
* __[Homepage DEV]()__
* __[Forums DEV]()__
* __[Plugin Repository](http://forums.imagicalmine.net/plugins)__
     Your ImagicalMine Server needs Visual Studio C++ Redistributable 2015 (If you are on windows).
     Set it up 
*__[here](https://www.microsoft.com/en-us/download/details.aspx?id=48145)__ <br>
*__[Extra Files- including suggested plugins](https://github.com/Inactive-to-Reactive/IM-Windowsx86-PHP7-extra-files)__ <br>
__[Back to QuickLinks](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#quick-links-instead-of-scrolling-click-these)__
<br>

## Windows Powershell Scripts

### Instructions:
1. Make sure that you are using windows
2. Open up Powershell ISE
3. Paste your desired script in to the top box
4. Edit the script to suit your needs
5. Test it by pressing the green arrow in the toolbar at the top
6. If it succeeds, the "last modified" date will have the time that you ran the script
7. Save the file

### Tip for Greater Success:
#### Set run times for each script using Task Scheduler
1. Search for/ Open up Windows Task Scheduler
2. On the "actions" page, create a new action. This is what it should be set to--> Action: Start a Program --> Program/script: powershell --> Add arguements (Optional): -file "{path to the powershell file that you just created}" --> Start in (Optional): {path to the folder that you put the powershell file in}

### Scripts:
1. To download the latest stable build using powershell: 
⋅
```
(New-Object Net.WebClient).DownloadFile("http://jenkins.terweij.nl/job/ImagicalMine/lastSuccessfulBuild/artifact/releases/ImagicalMine.phar","$((Resolve-Path .\).Path)\ImagicalMine.phar")
```
2. To stop the server and restart 2 seconds later:
..
```
cmd /c "$((Resolve-Path .\).Path)\forceshutdown.cmd"
Start-Sleep -s 2
cmd /c "$((Resolve-Path .\).Path)\start.cmd"
```
3. Backup script
..
```
new-item "$((Resolve-Path .\).Path)\backups" -itemtype directory
$a = Get-Date
new-item "$((Resolve-Path .\).Path)\backups\$($a.Year)-$($a.Month)-$($a.Day)-$($a.Hour)" -itemtype directory
Copy-Item "$((Resolve-Path .\).Path)\*" "$((Resolve-Path .\).Path)\backups\$($a.Year)-$($a.Month)-$($a.Day)-$($a.Hour)" -recurse -Exclude ".git"
```
All credit goes to @Ad5001 for making these script and @remote_vase for the ideas. <!---@remotevase AKA remote_vase and his father for making the future improved scripts together --> <br>
__[Back to QuickLinks](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#quick-links-instead-of-scrolling-click-these)__
<br>
## Acknowledgements

- ImagicalMine was originally devised by [ImagicalCorp](https://github.com/ImagicalCorp) and was authored in the [old github repository](https://github.com/ImagicalCorp/ImagicalMine).
- This is a third-party build of [PocketMine-MP](https://github.com/PocketMine/PocketMine-MP). ImagicalMine is in no way affiliated with [PocketMine-MP](https://github.com/PocketMine/PocketMine-MP).
- The original code in ImagicalMine is from [PocketMine-MP](https://github.com/PocketMine/PocketMine-MP). All original code structure and base was written by the [PocketMine Team](https://github.com/PocketMine).
- ImagicalMine's code sources include from [Katana](https://github.com/Hydreon/Katana), [Steadfast2](https://github.com/Hydreon/Steadfast2), [PocketMine-0.13.x](https://github.com/HmyTeamOrganization/PocketMine-0.13.x), [Genisys](https://github.com/iTXTech/Genisys) & [ClearSky](https://github.com/ClearSkyTeam/ClearSky).
- The switch for incompatible plugins is from a pull request from @PEMapModder on the official PM repo.
- The weather system was written by @matcracker.
- The hunger system is from Katana, but most of them was rewritten by @thebigsmileXD.
- The redstone system was written by @aodzip.
- The potion class was written by @thebigsmileXD. <br>
__[Back to QuickLinks](https://github.com/Inactive-to-Reactive/ImagicalMine/blob/master/README.md#quick-links-instead-of-scrolling-click-these)__
