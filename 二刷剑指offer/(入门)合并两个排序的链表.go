/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func mergeTwoLists(l1 *ListNode, l2 *ListNode) *ListNode {

    head := &ListNode{
        Val: 0,
        Next: nil,
    }
    cur := head
    for l1 != nil && l2 != nil {
        if l1.Val > l2.Val {
            cur.Next = l2
            l2 = l2.Next
            cur = cur.Next
        } else {
            cur.Next = l1
            l1 = l1.Next
            cur = cur.Next
        }
    }

    if l1 == nil {
        cur.Next = l2
    } else {
        cur.Next = l1
    }


    return head.Next
}


func mergeTwoLists(l1 *ListNode, l2 *ListNode) *ListNode {
    if l1 == nil && l2 == nil {
        return l1
    } else if l1 == nil {
        return l2
    } else if l2 == nil {
        return l1
    }

    if l2.Val < l1.Val {
        l1, l2 = l2, l1
    }
    l1.Next = mergeTwoLists(l1.Next, l2)
    return l1
}
