<?php
namespace App\Helpers;

use App\User;
use DateTime;
use Illuminate\Filesystem\Filesystem;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

/**
 * A helper class with custom static methods for easy access
 */
class AppHelper
{
    /**
     * The number of bytes in a megabyte
     */
    public const BYTES_IN_MEGABYTE = 1024 * 1024;

    /**
     * Get the passed in json file and return its contents. If 
     * file does not exists, return null.
     * @param string $file The json file to read
     * @return string The file's contents
     */
    public static function getJsonFile(string $file){

        if(file_exists($file)){
            
            $json = file_get_contents($file); 
            
            $contents = json_decode($json);
        } else {
            $contents = null;
        }
        return $contents;
    }

    /**
     * Assigns the given role a member permissions
     * @param Role $userRole The role to give permissions
     * @return null
     */
    public static function giveRoleMemberPermissions(Role $userRole)
    {
        $permissions[] = Permission::findOrCreate('create posts');
        $permissions[] = Permission::findOrCreate('edit posts');
        $permissions[] = Permission::findOrCreate('provide feedback');
        
        foreach ($permissions as $permission) {
            $userRole->givePermissionTo($permission);   
        }
    }
    
    /**
     * Get the profile image of the given user
     * @param string $student_id Student ID of the user
     * @return string $path The path of the user's profile image
     */
    public static function getUserProfileImage($student_id)
    {
        $fname = str_replace('/', '-', $student_id).'.jpg';

        if(file_exists("storage/avatars/$fname")){
            return "storage/avatars/$fname";
        }
        return 'storage/avatars/default.svg';
    }

    /**
     * Gets the image from the url passed. If the image doen't exists, 
     * a default image is returned as fallback
     * @param string $url The url of the image
     * @return string $path The path of the image
     */
    public static function getImage($url)
    {
        if(!empty($url)){
            if(file_exists("storage/$url")){
                return $url;
            }
        }

        return 'default.jpg';
    }

    public static function formatDateToReadable(string $date, string $option='with year')
    {
        $theDate = new DateTime(date("Y-m-d", strtotime($date)));
        $today = new DateTime(date("Y-m-d", time()));

        if ($option === 'without year'){
            return ($theDate == $today) ? "Today" : date('M d', strtotime($date));
        }
        return ($theDate == $today) ? "Today" : date('M jS, Y', strtotime($date));
    }

    /**
     * Returns the size (in megabytes) of the file passed to it.
     * @param string $file The file which size to find
     * @return float The size of the given file, rounded to nearest to 2s.f.
     */
    public static function getFileSize(string $file)
    {
        return round(filesize("storage/$file") / self::BYTES_IN_MEGABYTE, 2);
    }

    public static function getFileExtension(string $file)
    {
        $mimeType = mime_content_type("storage/$file");
        $ext = "";

        switch ($mimeType) {
            case 'application/vnd.ms-powerpoint':
            case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
                $ext = "PPT";
                break;
            case 'application/msword':
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                $ext = "DOC";
                break;
            case 'application/vnd.oasis.opendocument.presentation':
                $ext = "ODP";
                break;
            case 'application/vnd.oasis.opendocument.text':
                $ext = "ODT";
                 break;
            case 'application/pdf':
                $ext = "PDF";
                break;
            case 'application/epub+zip':
                $ext = "EPUB";
                break;
            default:
            $ext = "Unknown";
                break;
        }
        return $ext;

    }

    public static function getStudentName($student_id)
    {
        $user = User::select('name')->where('student_id', $student_id)->get();
        return $user;
    }

    public static function getStudent($student_id)
    {
        $user = User::whereStudentId($student_id)->firstOrFail();
        return $user;
    }

    public static function giveRoleExecutivePermissions(Role $role)
    {
        self::giveRoleMemberPermissions($role);

        $permissions[] = Permission::findOrCreate('add site settings');
        $permissions[] = Permission::findOrCreate('edit site settings');
        $permissions[] = Permission::findOrCreate('delete posts');
        $permissions[] = Permission::findOrCreate('delete feedback');
        $permissions[] = Permission::findOrCreate('delete events');
        $permissions[] = Permission::findOrCreate('edit events');
        $permissions[] = Permission::findOrCreate('create events');
        $permissions[] = Permission::findOrCreate('upload lecture materials');
        $permissions[] = Permission::findOrCreate('upload gallery');
        
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);   
        }
    }

    public static function giveRoleAdminPermissions(Role $role)
    {
        self::giveRoleExecutivePermissions($role);
        $permission = Permission::findOrCreate('administer site content');
        $role->givePermissionTo($permission);
    }

    public function instance()
    {
        return new AppHelper();
    }
}