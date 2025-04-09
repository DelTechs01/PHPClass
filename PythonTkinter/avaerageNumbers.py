#Quick Practice: Write a Python function that takes a list of numbers and returns their average. Handle potential errors (e.g., empty list).
def averageNumbers(numbers):
    if (len(numbers) == 0):
        return 0
    return sum(numbers)/ len(numbers)
print (averageNumbers([12, 30, 56, 47]))
print(averageNumbers([]))