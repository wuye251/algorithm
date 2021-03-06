<?php


//题目描述：给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。

// 说明:

// 初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
// 你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
// 示例:

// 输入:
// nums1 = [1,2,3,0,0,0], m = 3
// nums2 = [2,5,6],       n = 3

// 输出: [1,2,2,3,5,6]

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/merge-sorted-array
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    //思路：通常时间复杂度都是O(m+n),空间复杂度为O(n)
    //但是从nums1尾部插入时，空间复杂度降为O(1)
    function merge(&$nums1, $m, $nums2, $n) {
        if ($m <= 0) {
            $nums1 = $nums2;
            return $nums1;
        }
        if ($n <= 0) return $nums1;

        $pt1 = $m-1;
        $pt2 = $n-1;
        $p = $m + $n - 1;
        while($pt1>=0 && $pt2>=0) {
            $nums1[$p--] = ($nums1[$pt1] > $nums2[$pt2]) ? $nums1[$pt1--] : $nums2[$pt2--];
        }
        while($pt2>=0) {
            $nums1[$p--] = $nums2[$pt2--];
        }
        return $nums1;
    }
}