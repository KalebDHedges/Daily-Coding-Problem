#include <iostream>
#include <vector>
#include <climits>

void Push(int value, std::vector<int> &vector) {
	vector.push_back(value);
	std::cout << "Pushed " << value << " to the stack!\n";
}

void Pop(std::vector<int> &vector) {
	int lastElement = vector.size() - 1;
	int value = vector[lastElement];
	vector.pop_back();
	std::cout << "Popped " << value << " off the stack!\n";
}

void Max(std::vector<int> &vector) {
       int max = 0;
       for (int n : vector) {
	       if (max < n) max = n;
       }
       std::cout << "Max value is " << max << "!\n";
}       

int main() {

	std::vector<int> stack;
	int selection = 0;
	std::cout << "Welcome!\n";

	while (selection != 4) {
		std::cout << "\nOperations\n";
		std::cout << "1. Push\n2. Pop\n3. Max\n4. Quit\n";
		std::cout << "Please enter your desired operation: ";
		std::cin >> selection;

		int value = 0;

		switch (selection) {
			case 1:
				std::cout << "Please enter the value to add: ";
				std::cin >> value;

				Push(value, stack);
				
				selection = 0;
				break;
			case 2:
				Pop(stack);
				selection = 0;
				break;
			case 3:
				Max(stack);
				selection = 0;
				break;
			case 4:
				selection = 4;
				break;
			default:
				std::cout << "Invalid selection!\n\n";
				selection = 0;
		}
	}

	std::cout << "\nThank you for using this program!\n";

	return 0;
}
