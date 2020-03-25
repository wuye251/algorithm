<?php

// 给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。

// 示例 1:

// 输入: [1,2,3,4,5,6,7] 和 k = 3
// 输出: [5,6,7,1,2,3,4]
// 解释:
// 向右旋转 1 步: [7,1,2,3,4,5,6]
// 向右旋转 2 步: [6,7,1,2,3,4,5]
// 向右旋转 3 步: [5,6,7,1,2,3,4]
// 示例 2:

// 输入: [-1,-100,3,99] 和 k = 2
// 输出: [3,99,-1,-100]
// 解释: 
// 向右旋转 1 步: [99,-1,-100,3]
// 向右旋转 2 步: [3,99,-1,-100]
// 说明:

// 尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。
// 要求使用空间复杂度为 O(1) 的 原地 算法。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/rotate-array
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


//1：暴力
//每次修改一位交换  修改m次 每修改一次移动n次 O(mn) 空间负载为O(1)
//2:额外数组
//位置重新赋值   时空复杂度O(n)  O(n)
//3:循环替换
// 环状替代和我的思路一致，不过我觉得这样解释可能更容易理解。把元素看做同学，把下标看做座位，大家换座位。第一个同学离开座位去第k+1个座位，第k+1个座位的同学被挤出去了，他就去坐他后k个座位，如此反复。但是会出现一种情况，就是其中一个同学被挤开之后，坐到了第一个同学的位置（空位置，没人被挤出来），但是此时还有人没有调换位置，这样就顺着让第二个同学换位置。 那么什么时候就可以保证每个同学都换完了呢？n个同学，换n次，所以用一个count来计数即可。

//即 先将其中i+k 位置上的数都移到对应地方 i++
// 0+k 0+k+k  0+k+k+k 
// 2+k 2+k+k  
// 3+k....

//1》无论移动几位  数组元素所有元素都需要移动
//用一个count记录移动个数  如果count=元素个数 循环结束
//2》内层是如果有访问到/重叠已交换的元素 表示此次第i为 i+k i+k+k位置交换完毕
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $len = count($nums);
        //len < k 时 len % k 恒等于 len
        $k = $k % $len;
        $count = 0;
        for($start=0; $count<$len; $start++) {

            $pre = $nums[$start];
            $index = $start;
    
            do{
            	//k+index < len 则next = k+index
            	//k+index > len 则next = $a % b 
                $next = ($k+$index) % $len;

                $temp = $nums[$next];
                $nums[$next] = $pre;

                $pre = $temp;
                $index = $next;

                $count++;
            }while ($start != $index);
        }
        return $nums;
    }
}